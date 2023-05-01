<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDirectory extends Model
{
    use HasFactory;

    protected $table = 'image_directory';
    protected $fillable = ['image','directory_id'];

    public function directory(){
        return $this->belongsTo(Directory::class, 'id');
    }
}
