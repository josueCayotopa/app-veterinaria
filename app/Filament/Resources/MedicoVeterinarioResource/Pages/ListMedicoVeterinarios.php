<?php

namespace App\Filament\Resources\MedicoVeterinarioResource\Pages;

use App\Filament\Resources\MedicoVeterinarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicoVeterinarios extends ListRecords
{
    protected static string $resource = MedicoVeterinarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
