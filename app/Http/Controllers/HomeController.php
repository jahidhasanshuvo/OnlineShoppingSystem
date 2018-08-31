<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Print_;

session_start();

class HomeController extends Controller
{
    public function index()
    {
        $all_published_products = Product::select()
            ->where('publication_status', '=', 1)->paginate(9);
        $sliders = Slider::all()->where('published_status', '=', 1);
        $categories = Category::all()
            ->where('publication_status', '=', 1)
            ->where('category_id', '=', null);
        return view('home.home_content', ['all_published_products' => $all_published_products, 'categories' => $categories,
            'sliders' => $sliders]);
        /*return view('.pr');*/
    }

    public function searchByCategory($id)
    {
        $all_published_products = Product::select()
            ->where('publication_status', '=', 1)
            ->where('category_id', '=', $id)->orederByDesc('qty')->paginate(9);
        $sliders = Slider::all()->where('published_status', '=', 1);
        $categories = Category::all()
            ->where('publication_status', '=', 1)
            ->where('category_id', '=', null);
        return view('home.home_content', ['all_published_products' => $all_published_products, 'categories' => $categories,
            'sliders' => $sliders]);
        /*return view('.pr');*/
    }
}
