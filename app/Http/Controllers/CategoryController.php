<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request;
use App\Category;

Class CategoryController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        $categories = Category::where('parent_di', '=', 0)->get();
        $allcategories = Category::pluck('title', 'id')->all();
        return view('CategoryTreeview', compact('categories', 'allCategories'));
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
                        'title' => 'required'
        ]);
        $input = $request->all();
        $input['parent_id'] = empty($input[parent_id]) ? 0 : $input['parent_id'];

        Category::create($input);
        return back()->with('success', 'New category added successfully!')
        
    }


}