<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoficationForRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nofication_for_requests', function (Blueprint $table) {
            $table->increments('id');
             
             $table->string('sender_id');
              $table->string('sende_to_id');
              $table->string('sende_to_email');
              $table->string('request_id');
              $table->string('reuest_cause');
              $table->string('home_no');
              $table->string('sender_name');
               $table->string('status')->default("active");

               $table->string('msg_body');
            $table->string('title');
            
            


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
        Schema::dropIfExists('nofication_for_requests');
    }
}
