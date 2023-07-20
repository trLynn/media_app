<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // direct category list page
    public function index()
    {
        $category = Category::get();
        return view('admin.category.index',compact('category'));
    }

    // create category
    public function createCategory(Request $request)
    {
        $validator = $this->categoryValidationCheck($request);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $data = $this->getCategoryData($request);
        Category::create($data);
        return back();
    }

    //category validation check
    private function categoryValidationCheck($request)
    {
        $validationRules = [
            'category_name' => 'required',
            'category_description' => 'required'
        ];
        return Validator::make($request->all(),$validationRules);
    }

    //get category data
    private function getCategoryData($request)
    {
        return [
            'title' => $request->category_name,
            'description' => $request->category_description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }

    //delete category data
    public function deleteCategory($id)
    {
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Category Deleted!']);
    }

    //search category data
    public function searchCategory(Request $request)
    {
        $category = Category::where('title','LIKE','%'.$request->categor_search.'%')->get();
        return view('admin.category.index',compact('category'));
    }

    //edit category page
    public function categoryEditPage($id)
    {
        $category = Category::get();
        $updateData = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('updateData','category'));
    }

    //update category data
    public function categoryUpdate($id,Request $request)
    {
        $validator = $this->categoryValidationCheck($request);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $updateData = [
            'title' => $request->category_name,
            'description' => $request->category_description,
            'updated_at' => Carbon::now()
        ];
        Category::where('id',$id)->update($updateData);
        return redirect()->route('admin#category');
    }
}
