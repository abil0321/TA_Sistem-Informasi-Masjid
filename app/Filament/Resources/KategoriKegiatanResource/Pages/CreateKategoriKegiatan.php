<?php

namespace App\Filament\Resources\KategoriKegiatanResource\Pages;

use App\Filament\Resources\KategoriKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKategoriKegiatan extends CreateRecord
{
    protected static string $resource = KategoriKegiatanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
