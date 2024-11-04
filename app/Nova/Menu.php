<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mostafaznv\NovaCkEditor\CkEditor;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Menu extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Menu>
     */
    public static $model = \App\Models\Menu::class;
    public static function label()
    {
        return "Menus";
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name'
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
                Text::make("Name", 'name')
                    ->sortable(),
                Text::make(__('Seo_title'), 'seo_title')
                    ->sortable(),
                Text::make('Link', 'link')
                    ->sortable(),
                Textarea::make('Meta_keywords')
                    ->sortable(),
                Textarea::make('Meta_description')
                    ->sortable()


            ]),
            Text::make('Code', 'code')->rules(['required'])->sortable(),
            Textarea::make('Seo_links')
                ->sortable(),
            Textarea::make('Seo_scripts')
                ->sortable(),
            Boolean::make('Is details page', 'is_details_page')
                ->trueValue(true)
                ->falseValue(false)
                ->default(false),
            Boolean::make('See on footer', 'see_on_footer')
                ->trueValue(true)
                ->falseValue(false)
                ->default(false)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
