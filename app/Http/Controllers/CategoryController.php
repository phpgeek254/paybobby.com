<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
       $categories = Category::paginate(20);
       return view('category.category-list', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required|unique:categories']);
        Category::create($request->all());
        return redirect()->back()->withMessage('record created successfully');
    }

    public function show(Category $category)
    {
        $category->with('jobs');
        return view('category.show', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request, ['name'=>'required']);
        $category->update($request->all());
        return redirect()->back()->withMessage('Record Updated successfully');
    }

    public function destroy(Category $category)
    {
        foreach (Job::where('category_id', $category->id)->get() as $job){
            $job->delete();
        }
        $category->delete();
        return redirect()->back()->withMessage('Record deleted');
    }
}
