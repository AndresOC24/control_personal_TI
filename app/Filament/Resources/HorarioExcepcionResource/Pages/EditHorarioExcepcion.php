<?php

namespace App\Filament\Resources\HorarioExcepcionResource\Pages;

use App\Filament\Resources\HorarioExcepcionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHorarioExcepcion extends EditRecord
{
    protected static string $resource = HorarioExcepcionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
