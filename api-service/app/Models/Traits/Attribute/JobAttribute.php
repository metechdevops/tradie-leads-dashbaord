<?php

namespace App\Models\Traits\Attribute;

use Carbon\Carbon;

/**
 * Trait UserAttribute.
 */
trait JobAttribute
{
    
    //Get Lead associated location
    public function getLocationNameAttribute(){

        $location = $this->location()->first();
        return (!empty($location))?$this->location->name.' '.$this->location->postcode:'N/A';
    }

    //Get Lead associated location
    public function getCategoryNameAttribute(){

        $category = $this->category()->first();
        return (!empty($category))? $this->category->name :'N/A';
    }

    //Get Formatted Date and Time
    public function getDateAttribute(){

        $date = Carbon::parse($this->created_at);
        return $date->format('F @h:i A'); 
    }

    //Get Formatted Date and Time
    public function getLeadPriceAttribute(){
        
        return (!empty($this->price))? '$'.$this->price.' Lead Invitation' : 'N/A'; 
    }
}
