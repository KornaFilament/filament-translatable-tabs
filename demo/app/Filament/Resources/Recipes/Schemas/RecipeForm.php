<?php

namespace App\Filament\Resources\Recipes\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RecipeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TranslatableTabs::make()
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        Repeater::make('ingredients')
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Repeater::make('steps')
                            ->schema([
                                TextInput::make('instruction')
                                    ->required(),
                            ])
                    ])
                    ->columnSpanFull()
            ]);
    }
}
