<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;;

class Page extends Model
{
   protected $table = "pages";

    protected $fillable = [
    	'title','slug','description'
    ];
}
