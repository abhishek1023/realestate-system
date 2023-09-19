<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->uuid('property_id');  // the foreign key
            $table->uuid('property_type_id');
            $table->enum('title', ['Terraced','Flat','Semi-detached','Cottage','Bungalow','End of Terrace','Detatched']);
            $table->text('description');
            $table->text('property_type');
            $table->timestamps();

            // Adding the foreign key constraint
            $table->foreign('property_id')->references('uuid')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_details');
    }
}
