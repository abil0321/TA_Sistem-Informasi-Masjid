<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
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
                    ->prefix('Rp. ')
                    ->numeric(),
                FileUpload::make('attachments')
                    ->multiple()
                    ->default(null),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                    ->numeric(null, 0, '.')
                    ->sortable(),
                // Tables\Columns\TextColumn::make('foto')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('kategoriKegiatan.nama')
                    ->label('Kategori Kegiatan'),
                    // ->numeric()
                    // ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    // ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
