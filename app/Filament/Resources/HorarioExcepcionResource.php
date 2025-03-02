<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HorarioExcepcionResource\Pages;
use App\Filament\Resources\HorarioExcepcionResource\RelationManagers;
use App\Models\HorarioExcepcion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HorarioExcepcionResource extends Resource
{
    protected static ?string $model = HorarioExcepcion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Horarios Especiales';
    protected static ?string $navigationGroup = 'Gestión de Personal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable(),
                Forms\Components\DatePicker::make('fecha')
                    ->label('Fecha')
                    ->required(),
                Forms\Components\TimePicker::make('tiempo_entrada')
                    ->label('Entrada')
                    ->required(),
                Forms\Components\TimePicker::make('tiempo_salida')
                    ->label('Salida')
                    ->required(),
                Forms\Components\TextInput::make('motivo')
                    ->label('Motivo')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuario')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tiempo_entrada'),
                Tables\Columns\TextColumn::make('tiempo_salida'),
                Tables\Columns\TextColumn::make('motivo')
                    ->limit(30)
                    ->toggleable(),
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
            'index' => Pages\ListHorarioExcepcions::route('/'),
            'create' => Pages\CreateHorarioExcepcion::route('/create'),
            'edit' => Pages\EditHorarioExcepcion::route('/{record}/edit'),
        ];
    }
}
