<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::latest()->paginate(10);
        return view('admin.collections.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.collections.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'products' => 'nullable|array',
            'products.*' => 'exists:products,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('collections', 'public');
            $data['image'] = $path; // Store relative path from 'storage/app/public'
        }

        $collection = Collection::create($data);

        if ($request->has('products')) {
            $collection->products()->sync($request->input('products'));
        }

        return redirect()->route('admin.collections.index')
            ->with('success', 'Collection created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        $collection->load('products');
        return view('admin.collections.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        $products = Product::all();
        $collection->load('products');
        return view('admin.collections.edit', compact('collection', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'products' => 'nullable|array',
            'products.*' => 'exists:products,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($collection->image) {
                Storage::disk('public')->delete($collection->image);
            }
            $path = $request->file('image')->store('collections', 'public');
            $data['image'] = $path; // Store relative path from 'storage/app/public'
        } elseif ($request->boolean('remove_image')) { // Check if remove_image is true
            if ($collection->image) {
                Storage::disk('public')->delete($collection->image);
                $data['image'] = null;
            }
        }

        $collection->update($data);

        if ($request->has('products')) {
            $collection->products()->sync($request->input('products'));
        } else {
            $collection->products()->detach();
        }

        return redirect()->route('admin.collections.index')
            ->with('success', 'Collection updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        if ($collection->image) {
            Storage::disk('public')->delete($collection->image);
        }
        $collection->products()->detach();
        $collection->delete();

        return redirect()->route('admin.collections.index')
            ->with('success', 'Collection deleted successfully.');
    }
}