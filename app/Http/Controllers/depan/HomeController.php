<?php

namespace App\Http\Controllers\depan;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
 

    public function about() {
        $categorys = Category::latest()->get();
        return view('depan.about',compact('categorys'));
    }
}
