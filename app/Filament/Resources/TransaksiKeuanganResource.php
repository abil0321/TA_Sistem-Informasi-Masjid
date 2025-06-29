<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiKeuanganResource\Pages;
use App\Filament\Resources\TransaksiKeuanganResource\RelationManagers;
use App\Models\TransaksiKeuangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiKeuanganResource extends Resource
{
    protected static ?string $model = TransaksiKeuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('saldo')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('tanggal')
                    ->required(),
                Forms\Components\Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kategori_transaksi_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kegiatan_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('donasi_id')
                    ->numeric()
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('saldo')
                    ->numeric(null, 0, '.')
                    ->prefix('Rp. ')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->formatStateUsing(
                        fn(TransaksiKeuangan $record) =>
                        $record->kategoriTransaksi->nama == "Pemasukan"
                            ? $record->donasi->jumlah ?? '-'  // Jika "Pemasukan", ambil dari donasi
                            : $record->kegiatan->jumlah ?? '-' // Jika bukan, ambil dari kegiatan
                    )
                    ->numeric(null, 0, '.') // Format angka dengan ribuan separator
                    ->sortable(),
                // Tables\Columns\TextColumn::make(fn (TransaksiKeuangan $record) => $record->kategoriTransaksi->nama == "Pemasukan" ? "Donasi.jumlah" : "Kegiatan.jumlah")
                //     ->numeric(null, 0, '.')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('kategoriTransaksi.nama')
                    ->label('Kategori Transaksi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kegiatan_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('donasi_id')
                    ->numeric()
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
            'index' => Pages\ListTransaksiKeuangans::route('/'),
            'create' => Pages\CreateTransaksiKeuangan::route('/create'),
            'edit' => Pages\EditTransaksiKeuangan::route('/{record}/edit'),
        ];
    }
}
