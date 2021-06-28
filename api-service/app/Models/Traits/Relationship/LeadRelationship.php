<?php

namespace App\Models\Traits\Relationship;

use App\Models\CategoryModel;
use App\Models\LocationModel;


/**
 * Class UserRelationship.
 */
trait LeadRelationship
{

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->belongsTo(CategoryModel::class,'category_id','id');   
    }

    public function location()
    {
        return $this->belongsTo(LocationModel::class,'suburb_id','id');   
    }

}