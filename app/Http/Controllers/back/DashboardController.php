<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Articel;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',
    [
        'total_articel' => Articel::count(),
        'total_category'=> Category::count(),
        'new_articel'  => Articel::with('category')->whereStatus(1)->latest()->take(1)->get(),
        'populer_articel' => Articel::with('category')->where('views', '>', 0)->orderBy('views','desc')->take(1)->get()   
     ]);
    }
}
