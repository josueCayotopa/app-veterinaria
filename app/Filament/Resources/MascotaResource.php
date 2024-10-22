<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MascotaResource\Pages;
use App\Filament\Resources\MascotaResource\RelationManagers;
use App\Models\Mascota;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MascotaResource extends Resource
{
    protected static ?string $model = Mascota::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Informacion de su mascota')->schema([
                        TextInput::make('nombre')
                            ->required()
                            ->maxLength(255),
                        Select::make('tipo_mascota')
                            ->required()
                            ->reactive()
                            ->options([
                                'Perro' => 'Perro',
                                'Gato' => 'Gato',
                                'Ave' => 'Ave',
                                'Pez' => 'Pez',
                                'Roedor' => 'Roedor',
                                'Conejo' => 'Conejo',
                                'Reptil' => 'Reptil',
                                'Hurón' => 'Hurón',
                                'Exótico' => 'Exótico',
                            ]),
                        Select::make('raza')
                            ->required()
                            ->options(function (callable $get) {
                                $tipo = $get('tipo_mascota');

                                // Listado de razas según el tipo de mascota
                                $razas = [
                                    'Perro' => [
                                        'Labrador Retriever',
                                        'Pastor Alemán',
                                        'Bulldog',
                                        'Poodle',
                                        'Chihuahua'
                                    ],
                                    'Gato' => [
                                        'Siamés',
                                        'Persa',
                                        'Maine Coon',
                                        'Bengalí',
                                        'Sphynx'
                                    ],
                                    'Ave' => [
                                        'Loro',
                                        'Cacatúa',
                                        'Canario',
                                        'Agaporni',
                                        'Periquito'
                                    ],
                                    'Pez' => [
                                        'Pez Betta',
                                        'Goldfish',
                                        'Tetra Neón',
                                        'Guppy',
                                        'Pez Ángel'
                                    ],
                                    'Roedor' => [
                                        'Hamster Sirio',
                                        'Cobaya',
                                        'Chinchilla',
                                        'Rata Dumbo',
                                        'Jerbo'
                                    ],
                                    'Conejo' => [
                                        'Mini Lop',
                                        'Cabeza de León',
                                        'Holandés',
                                        'Rex',
                                        'Angora'
                                    ],
                                    'Reptil' => [
                                        'Gecko Leopardo',
                                        'Serpiente del Maíz',
                                        'Iguana Verde',
                                        'Dragón Barbudo',
                                        'Tortuga de Orejas Rojas'
                                    ],
                                    'Hurón' => [
                                        'Hurón Albino',
                                        'Hurón Sable',
                                        'Hurón Champán'
                                    ],
                                    'Exótico' => [
                                        'Axolotl',
                                        'Tarántula',
                                        'Iguana',
                                        'Serpiente Pitón Bola',
                                        'Fennec'
                                    ],
                                ];

                                return $razas[$tipo] ?? [];
                            })
                            ->required(),
                        TextInput::make('Descripcion')
                            ->required()
                            ->maxLength(255)
                    ])

                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make('Informacion')->schema([
                        TextInput::make('Peso')
                            ->required()
                            ->numeric(),
                        Select::make('Sexo')
                            ->required()
                            ->reactive()
                            ->options([
                                'Hembra' => 'Hembra',
                                'Macho' => 'Macho'

                            ]),
                        TextInput::make('Edad')
                            ->required()
                            ->numeric()
                            ->maxLength(20)
                    ])
                ])->columnSpan(1),

                Group::make()->schema([
                    Section::make('Datos adicionales')->schema([
                    TextInput::make('ingrese si es alérgico')
                        ->maxLength(255),
                    TextInput::make('Ingrese si ha tenido alguna cirujia')
                        ->maxLength(100)
                ])
              
                ])
                ->columnSpanFull()
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListMascotas::route('/'),
            'create' => Pages\CreateMascota::route('/create'),
            'edit' => Pages\EditMascota::route('/{record}/edit'),
        ];
    }
}
