<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    // Define the table being used by the model
    protected $table = 'blog_posts';

    // Define the relationship to the User
    public function user() {
    	return $this->belongsTo('App\Models\User');
    }

    // Get truncated small body attribute
    public function getSmallBodyAttribute() {
    	return strip_tags(Str::words($this->body, 50, "..."));
    }

    // Get formatted body attribute
    public function getFormattedBodyAttribute() {
        $breaks = array("<br />","<br>","<br/>");
        return str_ireplace($breaks, "\r\n", $this->body); 
    }
}
