<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->paginate(10);
        return view('admin.categories.index')->with(compact('categories')); //listado
    }

    public function create()
    {
        return view('admin.categories.create'); //registro
    }

    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$messages);
        // Category::create($request->all()); // mass assignment
        $category = Category::create($request->only('name', 'description'));
        if($request->hasFile('image')) {
            // guardar imagen
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            // update category
            if($moved) {
                $category->image = $fileName;
                $category->save();
            }
        }
        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category')); //registro
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::$rules, Category::$messages);
        $category->update($request->only('name', 'description'));

        if($request->hasFile('image')) {
            // guardar imagen
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            // update category
            if($moved) {
                $previousPath = $path . '/' . $category->image;

                $category->image = $fileName;
                $saved = $category->save();

                if($saved) {
                    File::delete($previousPath);
                }

            }
        }

        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete(); // insert
        return back();
    }
}
