<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'post_name',
        'contact_num',
        'description',
        'district_id',
        'category_id',
        'main_image',
        'sub_images',
        'partner_id'
    ];

}
