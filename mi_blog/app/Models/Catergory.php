<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Catergory;

class Catergory extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
