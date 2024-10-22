<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicioVeterinarioResource\Pages;
use App\Filament\Resources\ServicioVeterinarioResource\RelationManagers;
use App\Models\ServicioVeterinario;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicioVeterinarioResource extends Resource
{
    protected static ?string $model = ServicioVeterinario::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Datos del servicio')->schema(
                        [
                            Forms\Components\TextInput::make('nombre')
                                ->required()
                                ->maxLength(255),


                            Forms\Components\Select::make('tipo_servicio')
                                ->required()
                                ->label('Tipo de servicio')
                                ->options([
                                    'Consulta General' => 'Consulta General',
                                    'Vacunación' => 'Vacunación',
                                    'Desparasitación' => 'Desparasitación',
                                    'Cirugías' => 'Cirugías',
                                    'Diagnóstico por imagen' => 'Diagnóstico por imagen',
                                    'Análisis de laboratorio' => 'Análisis de laboratorio',
                                    'Hospitalización' => 'Hospitalización',
                                    'Odontología veterinaria' => 'Odontología veterinaria',
                                    'Emergencia' => 'Emergencia',
                                    'Dermatología' => 'Dermatología',
                                    'Terapia física y rehabilitación' => 'Terapia física y rehabilitación',
                                    'Nutrición y control de peso' => 'Nutrición y control de peso',
                                    'Etología' => 'Etología',
                                    'Peluquería y estética' => 'Peluquería y estética',
                                    'Reproducción y control reproductivo' => 'Reproducción y control reproductivo',
                                    'Cuidados paliativos y eutanasia' => 'Cuidados paliativos y eutanasia',
                                    'Servicios de ambulancia veterinaria' => 'Servicios de ambulancia veterinaria',
                                    'Medicina alternativa' => 'Medicina alternativa',


                                ]),



                        ]
                    )->columns(2),
                    Section::make('Información')->schema(
                        [
                            Forms\Components\TextInput::make('descripcion')
                                ->required()
                                ->maxLength(255),
                            Toggle::make('estado')
                                ->required()
                                ->default(true),
                        ]
                    )


                ])->columnSpan(2),
                Group::make()->schema(
                    [
                        //segmento
                        Section::make('Precio del servicio')->schema(
                            [
                                Forms\Components\TextInput::make('precio')
                                    ->numeric()
                                    ->required()
                                    ->step(0.01),
                            ]
                        )


                    ]
                )->columnSpan(1),


            ])->columns(3);;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('precio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_servicio')
                    ->searchable(),
                Tables\Columns\IconColumn::make('estado')
                    ->boolean(),
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
            'index' => Pages\ListServicioVeterinarios::route('/'),
            'create' => Pages\CreateServicioVeterinario::route('/create'),
            'edit' => Pages\EditServicioVeterinario::route('/{record}/edit'),
        ];
    }
}
