<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Catergory::class,'catergory_id');
    }
    
    public function commentary(){
        return $this->hasMany(Comment::class);
    }

    use SoftDeletes;
}
