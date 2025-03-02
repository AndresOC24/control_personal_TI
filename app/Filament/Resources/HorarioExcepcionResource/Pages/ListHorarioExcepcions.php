<?php

namespace App\Filament\Resources\HorarioExcepcionResource\Pages;

use App\Filament\Resources\HorarioExcepcionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHorarioExcepcions extends ListRecords
{
    protected static string $resource = HorarioExcepcionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
