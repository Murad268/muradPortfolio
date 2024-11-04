<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Comment extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Comment::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'full_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'full_name', 'email', 'comment'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Select::make('Blog', 'blog_id')->options(\App\Models\Blog::all()->pluck('title', 'id'))->displayUsingLabels()->sortable()->rules(['required']),

            Text::make('Full Name', 'full_name')->sortable()->nullable(),

            Text::make('Email')->sortable()->nullable(),

            Textarea::make('Comment')->nullable(),

            Boolean::make('Status')->sortable()->trueValue(true)->falseValue(false)->nullable(),
        ];
    }
}
