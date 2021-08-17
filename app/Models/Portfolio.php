<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $filable=[
        'title', 'sub_title','small_image', 'big_image', 'description', 'client', 'category','project_name', 'project_subtitle',
    ];
}
