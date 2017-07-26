<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeOrPlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_or_plots', function (Blueprint $table) {
            $table->increments('id');
             $table->string('house_name')->nullable();
            $table->string('is_home')->nullable()->default("yes");
            $table->string('is_allocated')->nullable()->default("no");
            $table->string('whome_to_allocated_id')->nullable();

           
                
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
        Schema::dropIfExists('home_or_plots');
    }
}
