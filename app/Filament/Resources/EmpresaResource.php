<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpresaResource\Pages;
use App\Filament\Resources\EmpresaResource\RelationManagers;
use App\Models\Empresa;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmpresaResource extends Resource
{
    protected static ?string $model = Empresa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema(
                    [
                        //segmento 
                        Section::make('Product Information')->schema(
                            [
                                forms\Components\TextInput::make('ruc')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('razon_social')
                                    ->required()
                                    ->maxLength(255),
                            ]
                        )->columns(2),
                        Section::make('Images')->schema(
                            [
                                Forms\Components\TextInput::make('nombre_representante_legal')
                                    ->maxLength(255)
                                    ->default(null),
                            ]
                        )

                    ]
                )->columnSpan(2),
                Group::make()->schema(
                    [
                        //segmento 
                        Section::make('Product Information')->schema(
                            [
                                Forms\Components\TextInput::make('direccion_legal')
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\TextInput::make('numero_celular')
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\TextInput::make('correo')
                                    ->maxLength(255)
                                    ->default(null),
                            ]
                        )


                    ]
                )->columnSpan(1),



            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ruc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('razon_social')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion_legal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_celular')
                    ->searchable(),
                Tables\Columns\TextColumn::make('correo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre_representante_legal')
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
            'index' => Pages\ListEmpresas::route('/'),
            'create' => Pages\CreateEmpresa::route('/create'),
            'edit' => Pages\EditEmpresa::route('/{record}/edit'),
        ];
    }
}
