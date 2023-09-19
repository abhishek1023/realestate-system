<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->uuid('uuid')->primary(); // Using uuid as the primary key
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->text('displayable_address');
            $table->string('image_full');
            $table->string('image_thumbnail');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('num_bedrooms');
            $table->integer('num_bathrooms');
            $table->bigInteger('price');
            $table->unsignedInteger('property_type_id');
            $table->enum('type', ['sale', 'rent']); // Assuming only "sale" and "rent" as possible types
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

