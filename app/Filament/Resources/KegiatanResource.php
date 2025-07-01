<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use App\Models\User;
use App\Observers\KegiatanObserver;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Pest\Support\Closure;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';

    protected static ?string $pluralModelLabel = 'Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('tanggal_mulai')
                    ->required(),
                Forms\Components\DateTimePicker::make('tanggal_selesai'),
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->maxValue(
                        fn($get) =>
                        (int) (TransaksiKeuangan::orderBy('tanggal', 'desc')->value('saldo') ?? 0)
                            + (int) ($get('jumlah_sebelumnya') ?? 0) // Pastikan jumlah sebelumnya ditambahkan
                    )
                    ->reactive()
                    ->afterStateHydrated(
                        fn($state, callable $set, $record) =>
                        $set('jumlah_sebelumnya', $record?->jumlah ?? 0) // Ambil jumlah sebelumnya saat edit
                    )
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('saldo_terakhir', TransaksiKeuangan::orderBy('tanggal', 'desc')->value('saldo') ?? 0)
                    )
                    ->prefix('Rp. ')
                    ->suffix(fn($get) => 'Saldo saat ini: Rp. ' . number_format(
                        (int) (TransaksiKeuangan::orderBy('tanggal', 'desc')->value('saldo') ?? 0)
                            + (int) ($get('jumlah_sebelumnya') ?? 0), // Tambahkan jumlah sebelumnya juga ke saldo akhir
                        0,
                        ',',
                        '.'
                    ))
                    ->numeric(),
                Forms\Components\Select::make('kategori_kegiatan_id')
                    ->label('Kategori')
                    ->relationship('kategoriKegiatan', 'nama')
                    ->options(KategoriKegiatan::all()->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->disabled()
                    ->relationship('user', 'name')
                    ->options(User::all()->pluck('name', 'id'))
                    ->default(Auth::user()->id)
                    ->required(),
                FileUpload::make('foto')
                    ->label('Foto Kegiatan')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull()
                    ->multiple()
                    ->visibility('public')
                    ->directory('kegiatan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d-m-Y H:i:s', 'Asia/Jakarta')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_kegiatan')
                    ->label('Nama Kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->prefix('Rp ')
                    ->numeric(0, '.')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategoriKegiatan.nama')
                    ->label('Kategori Kegiatan'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                // QueryBuilder::make()
                //     ->constraints([
                //         DateConstraint::make('created_at')
                //     ]),
                Filter::make('tanggal_mulai')
                    ->form([
                        DatePicker::make('from')->label('Dari Tanggal'),
                        DatePicker::make('to')->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->where('tanggal_mulai', '>=', $data['from']))
                            ->when($data['to'], fn($q) => $q->where('tanggal_mulai', '<=', $data['to']));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
