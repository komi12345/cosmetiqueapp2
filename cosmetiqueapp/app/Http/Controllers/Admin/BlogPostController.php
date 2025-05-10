<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogPosts = BlogPost::with('user')->latest()->paginate(10);
        return view('admin.blog_posts.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog_posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
        ]);

        $data = $request->only('title', 'content');
        $data['user_id'] = Auth::id();
        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        // Ensure slug is unique
        $originalSlug = $data['slug'];
        $counter = 1;
        while (BlogPost::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $counter++;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/blog_posts');
            $data['image'] = Storage::url($path);
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog_posts.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost) // Route model binding by slug
    {
        return view('admin.blog_posts.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view('admin.blog_posts.edit', compact('blogPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $blogPost->id,
        ]);

        $data = $request->only('title', 'content');
        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        // Ensure slug is unique if it has changed
        if ($blogPost->slug !== $data['slug'] || $blogPost->title !== $data['title']) {
            $originalSlug = $data['slug'];
            $counter = 1;
            while (BlogPost::where('slug', $data['slug'])->where('id', '!=', $blogPost->id)->exists()) {
                $data['slug'] = $originalSlug . '-' . $counter++;
            }
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blogPost->image) {
                Storage::delete(str_replace('/storage', 'public', $blogPost->image));
            }
            $path = $request->file('image')->store('public/blog_posts');
            $data['image'] = Storage::url($path);
        } elseif ($request->input('remove_image')) {
            if ($blogPost->image) {
                Storage::delete(str_replace('/storage', 'public', $blogPost->image));
                $data['image'] = null;
            }
        }

        $blogPost->update($data);

        return redirect()->route('admin.blog_posts.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        if ($blogPost->image) {
            Storage::delete(str_replace('/storage', 'public', $blogPost->image));
        }
        $blogPost->delete();

        return redirect()->route('admin.blog_posts.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}