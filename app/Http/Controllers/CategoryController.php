<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private $category;

    public function __construct()
    {
        $this->middleware('CheckUser');
        $this->category = new Category();
    }

    public function index()
    {
        $all_category_info = $this->category->paginate(8);
        return view('category.all_category',['all_category_info' => $all_category_info]);
    }

    public function addCategory()
    {
        $this->category = Category::all()->where('category_id', '=', null)
            ->where('publication_status', '=', '1');
        return view('category.add_category',['parent_category'=>$this->category]);
    }

    public function saveCategory(Request $request)
    {
        $this->category->name = $request->name;
        $this->category->description = $request->description;
        $this->category->publication_status = $request->publication_status == null ? 0 : 1;
        $this->category->category_id = $request->category_id;
        try{
            $this->category->save();
            Session::put('message', 'Category Added');
        }
        catch (\Exception $exception){

        }

    }

    public function inactiveCategory($id)
    {
        $this->category=Category::find($id);
        $this->category->publication_status = 0;
        $this->category->save();
        Session::put('message', 'Category Deactivated Successfully');
        return redirect(route('all_categories'));
    }

    public function activeCategory($id)
    {
        $this->category=Category::find($id);
        $this->category->publication_status = 1;
        $this->category->save();
        Session::put('message', 'Category Activated Successfully');
        return redirect(route('all_categories'));
    }

    public function editCategory($id)
    {
        $this->category=Category::find($id);
        $parent_category = Category::all()->where('category_id', '=', null)
            ->where('publication_status', '=', '1');
        return view('category.edit_category',['category'=>$this->category,'parent_category'=>$parent_category]);
    }

    public function updateCategory(Request $request, $id)
    {
        $this->category=Category::find($id);
        $this->category->name = $request->name;
        $this->category->description = $request->description;
        $this->category->category_id = $request->category_id;
        $this->category->save();
        Session::put('message', 'Category Updated Successfully');
        return redirect(route('all_categories'));
    }

    public function deleteCategory($id)
    {
        $this->category = Category::find($id);
        $this->category->delete();
        Session::put('message', 'Category deleted Successfully');
        return redirect(route('all_categories'));
    }
}
