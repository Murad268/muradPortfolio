<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use App\Models\Work;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->search;
        $tag = $request->tags;
        $category = $request->category;

        $blogPageBlogs = Blog::where('status', 1);

        if ($q) {
            $q = strtolower($q);
            $blogPageBlogs->where(function($query) use ($q) {
                $query->whereRaw('LOWER(title) like ?', ["%$q%"])
                    ->orWhereRaw('LOWER(text) like ?', ["%$q%"]);
            });
        }

        if ($tag) {
            $tag = strtolower($tag);
            $blogPageBlogs->whereRaw('LOWER(tags) like ?', ["%$tag%"]);
        }


        if ($category) {
            $blogPageBlogs->where('category_id', $category);
        }

        $blogPageBlogs = $blogPageBlogs->paginate(10);

        return view('pages.blogs', compact('blogPageBlogs'));
    }




    public function blog($slug)
    {
        $blog = Blog::where('slug', 'like', "%$slug%")->first();
        $prevBlog = Blog::where('id', '<', $blog->id)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->first();

        $nextBlog = Blog::where('id', '>', $blog->id)
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.blog', compact('blog', 'nextBlog', 'prevBlog'));
    }


    public function add_comment(Request $request, $id)
    {
        // Doğrulama kuralları
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string|min:5',
        ]);

        $comment = Comment::create(['blog_id' => $id, 'email' => $request->email, 'full_name' => $request->name, 'comment' => $request->comment]);

        return redirect()->back()->with('success', __('site.comment_added'))->withFragment('comment-success');
    }

}
