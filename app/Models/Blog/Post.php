<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Define the table being used by the model
    protected $table = 'blog_posts';

    // Define the relationship to the User
    public function user() {
    	return $this->belongsTo('App\Models\User');
    }
}
