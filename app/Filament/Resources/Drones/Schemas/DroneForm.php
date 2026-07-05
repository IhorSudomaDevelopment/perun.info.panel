<?php

namespace App\Filament\Resources\Drones\Schemas;

use App\ValuesObject\DroneStatus;
use App\ValuesObject\DroneType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

/**
 *
 */
class DroneForm
{
    /**
     * @param Schema $schema
     * @return Schema
     */
    public static function configure(Schema $schema): Schema
    {

        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name'),
                TextInput::make('serial_number')
                    ->label('SN')
                    ->required()
                    ->unique(
                        table: 'drones',
                        column: 'serial_number'
                    )
                    ->validationMessages([
                        'unique' => 'Drone with this serial number already exists.',
                    ]),
                TextInput::make('starlink_info')
                    ->label('Starlink Info'),
                TextInput::make('kit')
                    ->label('KIT'),
                TextInput::make('additional_info')
                    ->label('Additional Info'),
                Select::make('type')
                    ->label('Type')
                    ->placeholder('Choose')
                    ->options(DroneType::getList())
                    ->required(),
                TextInput::make('lost_info')
                    ->label('Lost Info'),
                Select::make('status')
                    ->label('Status')
                    ->placeholder('Choose')
                    ->options(DroneStatus::getList()),
            ]);

    }
}
