<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('owner_house_address')->nullable();
            $table->string('owner_contact')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('status')->default("Active");
            $table->string('owner_image_url')->nullable();

            $table->string('powerMan_name')->nullable();
            $table->string('powerMan_image_url')->nullable();
            $table->string('powerMan_id')->nullable();
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
        Schema::dropIfExists('service_requests');
    }
}
