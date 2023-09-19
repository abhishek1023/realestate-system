<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Property;
use App\Models\PropertyDetail;
use Illuminate\Support\Facades\Log;

class SyncProperties extends Command
{
    protected $signature = 'command:SyncProperties';
    protected $description = 'Import property data from Property API';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $url = env('PROPERTY_BASE_API_URL').'/properties';
        $apiKey = env('PROPERTY_API_KEY');
        $perPage = 30;  // Number of results per page
        $currentPage = 1;  // Start from the first page

        do {
            $response = Http::get($url, [
                'page[number]' => $currentPage,
                'page[size]' => $perPage,
                'api_key' => $apiKey
            ]);
            if ($response->successful()) {
                $data = $response->json();
                $properties = $data['data'];

                $propertyData = [];
                $propertyDetailData = [];

                foreach ($properties as $property) {
                    $uuid = $property['uuid'];
                                    // Upsert Property
                    Property::updateOrInsert(
                        ['uuid' => $property['uuid']],
                        [
                            'county' => $property['county'],
                            'country' => $property['country'],
                            'town' => $property['town'],
                            'description' => $property['description'],
                            'address' => $property['address'],
                            'displayable_address' => $property['address'],
                            'image_full' => $property['image_full'],
                            'image_thumbnail' => $property['image_thumbnail'],
                            'latitude' => $property['latitude'],
                            'longitude' => $property['longitude'],
                            'num_bedrooms' => $property['num_bedrooms'],
                            'num_bathrooms' => $property['num_bathrooms'],
                            'price' => $property['price'],
                            'property_type_id' => $property['property_type_id'],
                            'type' => $property['type'],
                            'created_at' => $property['created_at'],
                            'updated_at' => $property['updated_at'],
                        ]
                    );

                    // Upsert PropertyDetail
                    PropertyDetail::updateOrInsert(
                        ['property_id' => $property['uuid']],
                        [
                            'property_type_id' => $property['property_type']['id'],
                            'description' => $property['property_type']['description'],
                            'title' => $property['property_type']['title'],
                            'created_at' => $property['property_type']['created_at'],
                            'updated_at' => $property['property_type']['created_at'],
                        ]
                    );
                }
                // Bulk insert using Eloquent
                Property::insert($propertyData);
                PropertyDetail::insert($propertyDetailData);
                $currentPage++;
                $lastPage = $data['last_page'];
            } else {
                $this->error("Failed to fetch data from API");
                return 1;
            }
        }while ($currentPage <= $lastPage);  

        if ($response->successful()) {
            $properties = $response->json();

            
        } else {
            $this->error('API request failed');
        }
    }
}
