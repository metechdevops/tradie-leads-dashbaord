<?php

namespace App\Models;

use App\Models\Traits\Attribute\JobAttribute;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\LeadRelationship;


class JobModel extends Model
{
    use LeadRelationship,JobAttribute;


    /**
     * The tabe.
     *
     * @var string
     */
    protected $table = 'jobs';

        /**
     * The tabe.
     *
     * @var string
     */
    protected $appends = [
        'location_name',
        'category_name',
        'date',
        'lead_price',
    ];

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //
    ];

}
