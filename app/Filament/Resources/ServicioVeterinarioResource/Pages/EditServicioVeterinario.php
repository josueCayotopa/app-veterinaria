<?php

namespace App\Filament\Resources\ServicioVeterinarioResource\Pages;

use App\Filament\Resources\ServicioVeterinarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicioVeterinario extends EditRecord
{
    protected static string $resource = ServicioVeterinarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
