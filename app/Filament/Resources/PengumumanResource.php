<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumumanResource\Pages;
use App\Filament\Resources\PengumumanResource\RelationManagers;
use App\Models\KategoriPengumuman;
use App\Models\Pengumuman;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('isi')
                    ->label('Isi Pengumuman')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('kategori_pengumuman_id')
                    ->label('Kategori')
                    ->relationship('kategoriPengumuman', 'nama')
                    ->options(KategoriPengumuman::all()->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('referensi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DateTimePicker::make('tanggal')
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
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPengumumen::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
