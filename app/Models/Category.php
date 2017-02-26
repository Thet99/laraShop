<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nestable\NestableTrait;

class Category extends Model
{
    use SoftDeletes;
    use NestableTrait;

    protected $parent="parent_id";
    protected $table = "categories";

    protected $fillable = [
    	'title', 'icon_image', 'parent_id'
    ];
}
