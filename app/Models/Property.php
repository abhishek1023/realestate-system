<?php
// App/Models/Property.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['uuid', 'county', 'country', 'town', 'description', 'address', 'image_full', 'image_thumbnail', 'latitude', 'longitude', 'num_bedrooms', 'num_bathrooms', 'price', 'property_type_id', 'type','created_at','updated_at'];

    public function propertyDetail()
    {
        return $this->hasOne(PropertyDetail::class, 'property_uuid', 'uuid');
    }
}
