<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class LocationModel extends Model
{


    /**
     * The tabe.
     *
     * @var string
     */
    protected $table = 'suburbs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'postcode',
    ];

}
