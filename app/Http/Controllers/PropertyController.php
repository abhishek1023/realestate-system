<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyDetail;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query()->with('propertyDetail');

        // Filtering
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('num_bedrooms')) {
            $query->where('num_bedrooms', $request->num_bedrooms);
        }

        if ($request->has('price')) {
            $query->where('price', $request->price);
        }

        if ($request->has('type')) {
            $query->whereHas('propertyDetail', function ($q) use ($request) {
                $q->where('property_type', $request->type);
            });
        }

        if ($request->has('sale_rent')) {
            $query->where('type', $request->sale_rent);
        }

        $properties = $query->get();

        return view('properties.index', ['properties' => $properties]);
    }
}
