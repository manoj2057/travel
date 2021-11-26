<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_title',
        'slug',
        'image',
        'content',
        'admin_id',
        'view-count',
        'status',
        'background_image',
        'category_id'
    ];


    public function admin(){
        return $this->belongsTo(App\Models\Admin::class, 'admin_id');
    }


    public function category(){
        return $this->belongsTo(App\Models\Category::class, 'category_id');
    }
}