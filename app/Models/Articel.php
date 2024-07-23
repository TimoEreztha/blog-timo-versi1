<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articel extends Model
{
    use HasFactory;
  
    protected $fillable = ['user_id','title','content','category_id','status','publish_date'];

    public function category()
    {
        return $this->belongsTo(Category::class,'categories_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
