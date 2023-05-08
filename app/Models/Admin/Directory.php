<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use HasFactory;

    protected $table = 'directory';
    protected $fillable = ['category_id','author','slug','title','description','thumbnail','created_at','updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function image(){
        return $this->hasMany(ImageDirectory::class, 'directory_id');
    }

    public function getRouteKey()
    {
        return 'slug';
    }
}
