<?php

namespace App\Filament\Resources\MedicoVeterinarioResource\Pages;

use App\Filament\Resources\MedicoVeterinarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicoVeterinario extends EditRecord
{
    protected static string $resource = MedicoVeterinarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
