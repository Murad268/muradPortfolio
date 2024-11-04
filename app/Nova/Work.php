<?php
namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Work extends Resource
{
    use HasSortableRows;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Work::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'link';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'link'
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

            Image::make('Image')->nullable(),

            Text::make('Link')->sortable()->nullable(),
            Text::make('Company name', "company_name")->sortable()->nullable(),

            Boolean::make('Status')->sortable()->trueValue(true)->falseValue(false)->nullable(),

            // Category select field
            Select::make('Category')->options([
                'PHP - only Backend' => 'PHP - only Backend',
                'Sites I work on and provide technical support on' => 'Sites I work on and provide technical support on',
            ])->displayUsingLabels()->sortable(),
        ];
    }
}
