<?php

namespace App\Filament\Resources\Drones\Tables;

use App\ValuesObject\DroneStatus;
use App\ValuesObject\DroneType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DronesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->label('Type'),
                TextColumn::make('serial_number')->label('SN')->searchable(),
                TextColumn::make('kit')->label('KIT'),
                TextColumn::make('additional_info')->label('Additional Info'),
                TextColumn::make('status')->label('Status'),
            ])->recordUrl(NULL)
            ->filters([
                SelectFilter::make('type')
                    ->label('Type')
                    ->multiple()
                    ->options(DroneType::getList()),
                SelectFilter::make('status')
                    ->label('Status')
                    ->multiple()
                    ->options(DroneStatus::getList()),
            ])
            ->recordActions([
                ViewAction::make()
                    ->modalHeading('Drone')
                    ->schema([
                        Section::make()
                            ->columns()
                            ->schema([
                                TextInput::make('name')->label('Name')->copyable(),
                                TextInput::make('type')->label('Type')->copyable(),
                                TextInput::make('serial_number')->label('SN')->copyable(),
                                TextInput::make('starlink_info')->label('Starlink Info')->copyable(),
                                TextInput::make('kit')->label('KIT')->copyable(),
                                TextInput::make('additional_info')->label('Additional Info')->copyable(),
                                TextInput::make('lost_info')->label('Lost Info')->copyable(),
                                TextInput::make('status')->label('Status')->copyable(),
                            ])]),
                EditAction::make()
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ])
            ->emptyStateHeading('Records not found');
    }
}
