<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

class Lang extends Model
{
    use HasFactory, SortableTrait, ImageTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxOrder = self::max('order');
            $model->order = $maxOrder !== null ? $maxOrder + 1 : 1;
        });
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            // Ensure only one record has is_main_lang = true
            if ($model->is_main_lang) {
                static::where('id', '!=', $model->id)
                    ->update(['is_main_lang' => false]);

                app()->setlocale(LC_ALL, $model->code);
            }

            // Ensure only one record has admin_panel_main_lang = true
            if ($model->admin_panel_main_lang) {
                static::where('id', '!=', $model->id)
                    ->update(['admin_panel_main_lang' => false]);

                app()->setlocale($model->code);
            }
        });

        static::saved(function ($model) {
            // Check if there are no main languages and assign one randomly
            if (!self::where('is_main_lang', true)->exists()) {
                $randomLang = self::where('id', '!=', $model->id)
                    ->inRandomOrder()
                    ->first();

                if ($randomLang) {
                    $randomLang->is_main_lang = true;
                    $randomLang->save();
                }
            }

            // Check if there are no admin panel main languages and assign one randomly
            if (!self::where('admin_panel_main_lang', true)->exists()) {
                $randomLang = self::where('id', '!=', $model->id)
                    ->inRandomOrder()
                    ->first();

                if ($randomLang) {
                    $randomLang->admin_panel_main_lang = true;
                    $randomLang->save();
                }
            }
        });

        static::deleted(function ($model) {
            // Handle deletion for is_main_lang
            if ($model->is_main_lang) {
                $newMainLang = static::where('id', '!=', $model->id)
                    ->inRandomOrder()
                    ->first();

                if ($newMainLang) {
                    $newMainLang->is_main_lang = true;
                    $newMainLang->save();
                    app()->setlocale($newMainLang->code);
                }
            }

            // Handle deletion for admin_panel_main_lang
            if ($model->admin_panel_main_lang) {
                $newMainLang = static::where('id', '!=', $model->id)
                    ->inRandomOrder()
                    ->first();

                if ($newMainLang) {
                    $newMainLang->admin_panel_main_lang = true;
                    $newMainLang->save();
                    app()->setlocale($newMainLang->code);
                }
            }
        });
    }
}
