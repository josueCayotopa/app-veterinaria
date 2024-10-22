<?php

namespace App\Filament\Resources\ServicioVeterinarioResource\Pages;

use App\Filament\Resources\ServicioVeterinarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServicioVeterinarios extends ListRecords
{
    protected static string $resource = ServicioVeterinarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
