<?php

namespace App\Filament\Resources\CustomerTypeResource\Pages;

use App\Filament\Resources\CustomerTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCustomerTypes extends ManageRecords
{
    protected static string $resource = CustomerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->modalWidth('md'),
        ];
    }
}
