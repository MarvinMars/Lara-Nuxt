<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    
    protected $fillable = [
        "name",
        "email",
        "company",
        "project_details",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/contacts/'.$this->getKey());
    }

    
}
