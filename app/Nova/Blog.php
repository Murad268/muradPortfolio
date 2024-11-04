<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Textarea;
use Mostafaznv\NovaCkEditor\CkEditor;
use Laravel\Nova\Http\Requests\NovaRequest;

class Blog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Blog::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title', 'tags'
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

            NovaTabTranslatable::make([
                Text::make('Title', 'title')->sortable()->nullable(),
                CkEditor::make('Text', 'text')->nullable(),
                Text::make('Tags', 'tags')->nullable(),
                Text::make('SEO Title', 'seo_title')->nullable(),
                Textarea::make('SEO Keywords', 'seo_keywords')->nullable(),
                Textarea::make('SEO Description', 'seo_description')->nullable(),
            ]),

            DateTime::make('Date')->nullable(),

            Image::make('Image')->nullable(),
            Image::make('Inner Image', 'inner_image')->nullable(),

            Select::make('Category', 'category_id')->options(\App\Models\BlogCategory::all()->pluck('title', 'id'))->displayUsingLabels()->sortable()->rules(['required']),

            Boolean::make('Status')->sortable()->trueValue(true)->falseValue(false)->nullable(),

            Textarea::make('SEO Links', 'seo_links')->nullable(), // Non-translatable
            Textarea::make('SEO Scripts', 'seo_scripts')->nullable(), // Non-translatable
        ];
    }
}
