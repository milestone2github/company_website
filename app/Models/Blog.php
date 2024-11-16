<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // If your database table name doesn't follow Laravel's naming convention,
    // you can explicitly define the table name like this:
    protected $table = 'blogs';

    // If you want to allow mass assignment on some of your model fields:
    protected $fillable = ['title', 'description', 'image_url', 'author', 'post_date', 'slug'];

    // If you do not want to use mass assignment, you may also use the guarded attribute:
    protected $guarded = [];
}
