<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->search;
        $category = $request->category;
        $projects = Work::where('status', 1)->orderBy('order');
        if ($q) {
            $projects->where(function($query) use ($q) {
                $query->where('link', 'like', "%$q%");
            });
        }
        if ($category) {
            $projects->where('category', $category);
        }
        $projects = $projects->paginate(10);
        return view('pages.projects', compact('projects'));
    }
}
