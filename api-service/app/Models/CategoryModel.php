<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CategoryModel extends Model
{


    /**
     * The tabe.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'paent_category_id',
    ];

}
