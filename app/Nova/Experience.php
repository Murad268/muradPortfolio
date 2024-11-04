<?php
namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Mostafaznv\NovaCkEditor\CkEditor;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Experience extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Experience::class;

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
        'title', 'year'
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

            Text::make('Year')->sortable()->nullable(),


                Text::make('Title', 'title')->sortable()->nullable(),
                Textarea::make('Description', 'description')->nullable(),
                NovaTabTranslatable::make([
                    CkEditor::make('Text','text'),
                ]),


            Boolean::make('Status')->sortable()->trueValue(true)->falseValue(false)->nullable(),


        ];
    }
}
