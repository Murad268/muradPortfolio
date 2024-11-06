<?php
namespace App\Providers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Info;
use App\Models\Lang;
use App\Models\Menu;
use App\Models\Service;
use App\Nova\HeroString;
use App\Repositories\MenuRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MenuRepository::class, function ($app) {
            return new MenuRepository(new Menu);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            $locale = app()->getLocale();
            $tags = Blog::where('tags', '!=', null)->select("tags")->get();
            $allTags = [];

            foreach ($tags as $tag) {
                $allTags[] = $tag;
            }

            $allTags = array_unique($allTags);
            $view->with('infos', Info::first());
            $view->with('heroStrings', \App\Models\HeroString::where('status', 1)->orderBy('order')->get());
            $view->with('services', \App\Models\Service::where('status', 1)->orderBy('order')->get());
            $view->with('experiences', \App\Models\Experience::where('status', 1)->orderBy('order')->get());
            $view->with('skills', \App\Models\Skill::where('status', 1)->orderBy('order')->get());
            $view->with('works', \App\Models\Work::where('status', 1)->orderBy('order')->paginate(4));
            $view->with('crts', \App\Models\Certificate::where('status', 1)->orderBy('order')->get());
            $view->with('lents', \App\Models\Lent::where('status', 1)->orderBy('order')->get());
            $view->with('blogs', \App\Models\Blog::where('status', 1)->paginate(6));
            $view->with('blogCategories', \App\Models\BlogCategory::where('status', 1)->orderBy('order')->get());
            $view->with('ais', \App\Models\AiGallery::inRandomorder()->paginate(9));
            $view->with('allTags', $allTags);
            $menuRepository = app(MenuRepository::class);
            $view->with('menuRepository', $menuRepository);
            $langs = Lang::where('status', 1)->get();
            $view->with('langs', $langs);
        });
    }
}
