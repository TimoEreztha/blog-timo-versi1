<?php

namespace App\Http\Controllers\depan;

use App\Http\Controllers\Controller;
use App\Models\Articel;
use App\Models\Category;
use Illuminate\Http\Request;

class DepanCotroller extends Controller
{
    public function index() {
      
        $posts_terbaru = Articel::whereStatus('publish')->with(['category','user'])->latest()->firstOrFail();
        $post_data = Articel::whereStatus('publish')->with(['category', 'user'])->latest()->paginate(4);
    
        
        return view('depan.index', [
            'posts_terbaru' => $posts_terbaru,
            'post_data' => $post_data
        ]);
    }
}