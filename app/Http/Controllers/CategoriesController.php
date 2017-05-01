<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index(Category $category)
    {
        $ads = $category->ads()->paginate(Ad::ADS_LIST_PAGE_SIZE);
        return view('ads.index', ['ads' => $ads, 'queries' => []]);
    }
}
