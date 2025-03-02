<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HorarioTrabajoResource\Pages;
use App\Filament\Resources\HorarioTrabajoResource\RelationManagers;
use App\Models\HorarioTrabajo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HorarioTrabajoResource extends Resource
{
    protected static ?string $model = HorarioTrabajo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('dia')
                    ->label('Día')
                    ->options([
                        'Lunes' => 'Lunes',
                        'Martes' => 'Martes',
                        'Miercoles' => 'Miercoles',
                        'Jueves' => 'Jueves',
                        'Viernes' => 'Viernes',
                    ])
                    ->required(),
                Forms\Components\TimePicker::make('tiempo_entrada')
                    ->label('Hora de Entrada')
                    ->required(),
                Forms\Components\TimePicker::make('tiempo_salida')
                    ->label('Hora de Salida')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tiempo_entrada'),
                Tables\Columns\TextColumn::make('tiempo_salida'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHorarioTrabajos::route('/'),
            'create' => Pages\CreateHorarioTrabajo::route('/create'),
            'edit' => Pages\EditHorarioTrabajo::route('/{record}/edit'),
        ];
    }
}
