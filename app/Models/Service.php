<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    // If your database table name doesn't follow Laravel's naming convention,
    // you can explicitly define the table name like this:
    protected $table = 'services';

    // If you want to allow mass assignment on some of your model fields:
    protected $fillable = ['title', 'description', 'image', 'slug'];
}
