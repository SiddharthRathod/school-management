<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'post_by', 'targete_user'];    
    protected $with = ['author']; 

    public function author() { 
        return $this->belongsTo(User::class, 'user_id');
    }
}
