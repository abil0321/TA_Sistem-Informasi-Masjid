<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumumanResource\Pages;
use App\Filament\Resources\PengumumanResource\RelationManagers;
use App\Models\KategoriPengumuman;
use App\Models\Pengumuman;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $pluralModelLabel = 'Pengumuman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Detail')
                        ->schema([
                            Forms\Components\TextInput::make('judul')
                                ->required()
                                ->columnSpanFull()
                                ->maxLength(255),
                            Forms\Components\Select::make('kategori_pengumuman_id')
                                ->label('Kategori')
                                ->relationship('kategoriPengumuman', 'nama')
                                ->options(KategoriPengumuman::all()->pluck('nama', 'id'))
                                ->required(),
                            Forms\Components\DateTimePicker::make('tanggal')
                                ->default(date('d M Y'))
                                ->required(),
                            Forms\Components\TextInput::make('referensi')
                                ->maxLength(255)
                                ->default(null),
                            Forms\Components\Select::make('user_id')
                                ->label('User')
                                ->disabled()
                                ->relationship('user', 'name')
                                ->options(User::all()->pluck('name', 'id'))
                                ->default(Auth::user()->id)
                                ->required(),
                        ]),
                    Wizard\Step::make('Deskripsi')
                        ->schema([
                            Forms\Components\RichEditor::make('isi')
                                ->label('Isi Pengumuman')
                                ->columns(5)
                                ->required()
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'underline',
                                    'strike',
                                    'link',
                                    'h1',
                                    'h2',
                                    'h3',
                                    'blockquote',
                                    'codeBlock',
                                    'bulletList',
                                    'orderedList',
                                    'attachFiles',
                                    'undo',
                                    'redo',
                                ])
                                ->fileAttachmentsDirectory(directory: 'pengumuman')
                                ->columnSpanFull(),
                        ]),
                ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategoriPengumuman.nama')
                    ->label('Kategori Pengumuman'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('referensi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
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
                Filter::make('tanggal')
                    ->form([
                        DatePicker::make('from')->label('Dari Tanggal'),
                        DatePicker::make('to')->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->where('tanggal', '>=', $data['from']))
                            ->when($data['to'], fn($q) => $q->where('tanggal', '<=', $data['to']));
                    }),
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
            'index' => Pages\ListPengumumen::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
