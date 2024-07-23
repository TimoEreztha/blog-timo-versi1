<?php

namespace App\Http\Controllers\depan;

use App\Http\Controllers\Controller;
use App\Models\Articel;
use Illuminate\Http\Request;

class CategoryArticelController extends Controller
{
    public function index($slug) {
        $categorys = Articel::with(['category','user'])->whereHas('category', function($e) use ($slug) {
            $e->where('slug', $slug);
        })->latest()->paginate(10);
        return  view('depan.category',compact('categorys'));
    }
}
