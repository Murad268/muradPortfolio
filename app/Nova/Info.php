<?php
namespace App\Nova;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Panel;
use Mostafaznv\NovaCkEditor\CkEditor;
use Laravel\Nova\Http\Requests\NovaRequest;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;

class Info extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Info::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'hero_title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'hero_title', 'email', 'phone_number'
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

            Image::make('Logo')->nullable(),
            Image::make('Favicon')->nullable(),
            Image::make("Hero image",'hero_image')->nullable(),
            Image::make("About image",'about_image')->nullable(),
            File::make('Hero Video', "hero_video")->nullable(),
            File::make('Resume file', "resume_file")->nullable(),
            NovaTabTranslatable::make([
                Text::make('Hero Title', 'hero_title')->nullable(),
                Text::make('About Section Title', 'about_section_title')->nullable(),
                CkEditor::make('Hero Description', 'hero_description')->nullable(),
                Textarea::make('Copyright Text', 'copyright_text')->nullable(),
                Textarea::make('Sub text services', 'services_subtext')->nullable(),
                Textarea::make('Sub text education', 'education_subtext')->nullable(),
                Textarea::make('Sub text portfolio', 'subtext_portfolio')->nullable(),
                Textarea::make('Sub text blogs', 'subtext_blogs')->nullable(),
                Textarea::make('About Text', 'about_text')->nullable(),
                Textarea::make('Hamburger Menu About Text', 'hamburger_menu_about_text')->nullable(),
                Text::make('Get in Touch Title', 'get_in_touch_title')->nullable(), // Yeni sahə əlavə edildi
                Textarea::make('Get in Touch Description', 'get_in_touch_description')->nullable(), // Yeni sahə əlavə edildi
                Textarea::make('Address', 'address')->nullable(),
            ]),

            Image::make('Resume File', 'resume_file')->nullable(),
            Textarea::make('Iframe', 'iframe')->nullable(),
            Text::make('LinkedIn')->nullable(),
            Text::make('Instagram')->nullable(),
            Text::make('Facebook')->nullable(),
            Text::make('GitHub')->nullable(),

            Text::make('Email')->nullable(),
            Text::make('Phone Number', 'phone_number')->nullable(),

            Number::make('Project Count')->nullable(),
            Number::make('Worker on Project Count')->nullable(),
            Number::make('Client Reviews Count')->nullable(),
            Number::make('Experience Year Count')->nullable(),

            new Panel('Timestamps', [
                Text::make('Created At')->onlyOnDetail(),
                Text::make('Updated At')->onlyOnDetail(),
            ]),
        ];
    }
}
