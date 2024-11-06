<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Nova\Blog;
use App\Repositories\MenuRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class SwitchLanguageController extends Controller
{
    public function __construct(

        public MenuRepository $menuRepository
    ) {}

    public function switch($code)
    {
        // Set the application locale
        app()->setLocale($code);

        // Cache the selected locale for 30 days
        Cache::put('app_locale', $code, now()->addDays(30));
        $lang = Cache::get('app_locale', config('app.locale'));

        // Get the previous URL
        $previousUrl = url()->previous();

        // Explode the URL into segments
        $urlSegments = explode('/', $previousUrl);

        // Check if the URL has at least 4 segments
        if (isset($urlSegments[4])) {
            $slug = $urlSegments[4];
            $pageSlug = urldecode($urlSegments[3]);
            // Check if there is a menu item matching the slug
            if (Menu::where('link', 'like', "%$pageSlug%")->get()) {

                $slug = urldecode($slug);

                $menu = Menu::where('link', 'like', "%$pageSlug%")
                    ->where('is_details_page', true)
                    ->first();
                if ($slug && $menu->code == 'blog') {
                    $blog = \App\Models\Blog::where('slug', 'like', "%$slug%")->first()->slug;

                    return redirect(env('APP_URL') . $menu->link.'/'.$blog);
                }
                if ($slug && $menu->code == 'service') {
                    $service = \App\Models\Service::where('slug', 'like', "%$slug%")->first()->slug;

                    return redirect(env('APP_URL') . $menu->link.'/'.$service);
                }
                return redirect(env('APP_URL') . $menu->link . '/' . $slug);

            }
        } else {
            // If not enough segments, use MenuRepository to get new slug
            $slug = $urlSegments[3] ?? '';
            $newSlug = $this->menuRepository->menuByUrl($slug)->link ?? '/';

            return redirect($newSlug);
        }

        return redirect()->back();
    }

}
