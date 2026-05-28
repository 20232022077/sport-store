<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();

        return view('admin.category.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'status' => 'required',
        ]);

        $data = new Category();
        $data->title       = $request->input('title');
        $data->keywords    = $request->input('keywords');
        $data->description = $request->input('description');
        $data->status      = $request->input('status');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data->image = $path;
        }

        $data->save();

        return redirect()->route('admin.category.index')->with('success', 'Category added successfully.');
    }

    public function show($id)
    {
        $data = Category::find($id);

        return view('admin.category.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Category::find($id);

        return view('admin.category.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Category::find($id);

        $data->title       = $request->title;
        $data->keywords    = $request->keywords;
        $data->description = $request->description;
        $data->status      = $request->status;

        if ($request->hasFile('image')) {
            if ($data->image) {
                Storage::disk('public')->delete($data->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $data->image = $path;
        }

        $data->save();

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $data = Category::find($id);

        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }

        $data->delete();

        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
}
