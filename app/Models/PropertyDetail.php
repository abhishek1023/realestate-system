<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    protected $fillable = ['property_id', 'property_type_id', 'description', 'title','created_at','updated_at'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid', 'uuid');
    }
}
