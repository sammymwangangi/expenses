<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;
use Filament\Forms\Components\DatePicker;

class ExpenseResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\DateTimePicker::make('date')
                    ->autofocus() // Autofocus the field.
                    ->displayFormat($format = 'F j, Y H:i:s') // Set the display format of the field, using PHP date formatting tokens.
                    ->firstDayOfWeek($day = 1) // Set the first day of the week in the calendar view, with 1 being Monday, and 0 or 7 being Sunday.
                    ->format($format = 'Y-m-d H:i:s') // Set the storage format of the field, using PHP date formatting tokens.
                    ->placeholder('select date') // Set the placeholder for when the field is empty. It supports localization strings.
                    ->weekStartsOnMonday() // Set the first day of the week to Monday in the calendar view.
                    ->weekStartsOnSunday()
                    ->withoutSeconds(), // Hide the seconds input.

                Components\TextInput::make('cost')
                    ->autofocus() // Autofocus the field.
                    ->numeric() // Require a numeric value to be provided.
                    ->placeholder('1000') // Set the placeholder for when the field is empty. It supports localization strings.
                    ->type($type = 'number'), // Set the input's HTML type.

                Components\TextInput::make('item')
                    ->autocomplete($autocomplete = 'on') // Set up autocomplete for the field.
                    ->autofocus() // Autofocus the field.
                    ->placeholder('Rent') // Set the placeholder for when the field is empty. It supports localization strings.
                    ->type($type = 'text'), // Set the input's HTML type.
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('item')->primary(),
                Columns\Text::make('cost')->primary(),
                Columns\Text::make('date')->date(),
                ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListExpenses::routeTo('/', 'index'),
            Pages\CreateExpense::routeTo('/create', 'create'),
            Pages\EditExpense::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
