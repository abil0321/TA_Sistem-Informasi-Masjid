<?php

namespace App\Filament\Resources\KategoriKegiatanResource\Pages;

use App\Filament\Resources\KategoriKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriKegiatan extends EditRecord
{
    protected static string $resource = KategoriKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
