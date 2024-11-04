<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Translate extends Resource
{
    public static $model = \App\Models\Translate::class;

    public static function label()
    {
        return "Dictionary";
    }



    public static $title = 'id';

    public static $search = [
        'id',
        'group',
        'code',
        'value'
    ];

    public function fields(NovaRequest $request)
    {
        $languages = \App\Models\Lang::all(); // İstifadə olunan dillər

        // Formdan gələn məlumatları əldə edək
        $group = $request->get('group');
        $code = $request->get('code');

        // Köhnə faylı silmək üçün əvvəlki group-u tapmaq lazımdır.
        $oldGroup = $this->resource->group ?? null;

        // Tərcümə dəyərlərini əl ilə əldə edirik
        $values = [];

        // Hər dil üçün dövrə salırıq
        foreach ($languages as $lang) {
            $langCode = $lang->code; // Burada dil kodu (məsələn, 'az', 'en', 'ru') gəlir
            $translationsKey = 'translations_value_' . $langCode; // Form məlumatına uyğun açar yaradırıq

            // Hər dilə uyğun tərcümə dəyərini request-dən alırıq
            $values[$langCode] = $request->get($translationsKey);
        }

        // Faylları yaratmadan və yeniləmədən əvvəl yoxlayaq
        if ($group && $code && !empty($values)) {

            // Faylı tapıb, mövcud tərcümələri saxlayırıq
            foreach ($languages as $lang) {
                $langCode = $lang->code; // Dil kodu (az, en, ru)

                // Qovluq və fayl yolu üçün dil kodunu istifadə edirik
                $path = resource_path("lang/{$langCode}/{$group}.php");

                // Fayl direktoriyasını və faylı yoxlayırıq, lazım gələrsə yaradırıq
                if (!File::exists($path)) {
                    if (!File::exists(resource_path("lang/{$langCode}"))) {
                        File::makeDirectory(resource_path("lang/{$langCode}"), 0755, true);
                    }
                    File::put($path, "<?php\n\nreturn [\n];\n");
                }

                // Mövcud faylı oxuyuruq
                $translations = include($path);

                // Yeni gələn dəyərləri mövcud tərcümələrə əlavə edirik
                if (!empty($values[$langCode])) {
                    $translations[$code] = $values[$langCode];
                }

                // Yenilənmiş tərcümələri fayla yazırıq
                $content = "<?php\n\nreturn [\n";
                foreach ($translations as $key => $value) {
                    $content .= "    '{$key}' => '" . addslashes($value) . "',\n";
                }
                $content .= "];\n";

                File::put($path, $content); // Faylı yaz
            }
        } else {
            Log::info('Məlumat düzgün gəlməyib və ya dəyərlər boşdur');
        }

        return [
            ID::make()->sortable(),
            Text::make(__('admin_panel.group'), 'group')
                ->rules(['required'])
                ->sortable(),
            Text::make(__('admin_panel.code'), 'code')
                ->rules(['required']),

            NovaTabTranslatable::make([
                Text::make(__('admin_panel.value'), 'value')
                    ->sortable()
                    ->rules('nullable', 'max:255'),
            ])
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
