<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class ContactForm extends Resource
{
    public static $model = \App\Models\ContactForm::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'email'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable(),
            Text::make('Email')->sortable(),
            Text::make('Phone')->nullable(),
            Text::make('Website')->nullable(),
            Textarea::make('Message')->alwaysShow(),
        ];
    }
}
