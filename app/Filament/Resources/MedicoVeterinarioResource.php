<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicoVeterinarioResource\Pages;
use App\Filament\Resources\MedicoVeterinarioResource\RelationManagers;
use App\Models\MedicoVeterinario;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\Group as ComponentsGroup;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedicoVeterinarioResource extends Resource
{
    protected static ?string $model = MedicoVeterinario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make("Información Básica")->schema([
                        Forms\Components\Select::make('tipo_documento')
                            ->options([
                                'DNI' => 'DNI',
                                'PASAPORTE' => 'Pasaporte',
                                'CARNET DE EXTRANJERIA' => 'Carnet de extranjería'
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('numero_documento')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nombres')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('apellidos')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('celular')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('direccion')
                            ->maxLength(255)
                            ->columnSpan(2)
                    ])
                        ->columns(),

                ]),

                Group::make()->schema([
                    Section::make("Informacion Profesional")->schema([
                        Forms\Components\TextInput::make('numero_de_colegiatura')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('especializacion')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('universidad')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('profesion')
                            ->maxLength(255)
                            ->columnSpan(2),
                    ])
                        ->columns(2),


                ]),
                Section::make("Informacion de contacto y disponibilidad")->schema([
                    Forms\Components\TextInput::make('telefono_emergencia')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('disponibilidad')
                        ->label('Disponibilidad')
                        ->default(false),
                    Forms\Components\Select::make('tipo_contrato')
                        ->options([
                            'TIEMPO_COMPLETO' => 'Contrato tiempo completo',
                            'TIEMPO_PARCIAL' => 'Contrato tiempo parcial',
                        ])
                ])
                    ->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo_documento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_documento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombres')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellidos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('celular')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_de_colegiatura')
                    ->searchable(),
                Tables\Columns\TextColumn::make('especializacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('universidad')
                    ->searchable(),
                Tables\Columns\IconColumn::make('disponibilidad')
                    ->boolean(),
                Tables\Columns\TextColumn::make('profesion')
                    ->searchable(),
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
            'index' => Pages\ListMedicoVeterinarios::route('/'),
            'create' => Pages\CreateMedicoVeterinario::route('/create'),
            'edit' => Pages\EditMedicoVeterinario::route('/{record}/edit'),
        ];
    }
}
