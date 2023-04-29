<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use HasFactory;

    protected $table = 'directory';
    protected $fillable = ['category_id','slug','title','description','image','created_at','updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
