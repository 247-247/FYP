<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobalNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_notifications', function (Blueprint $table) {
            $table->increments('id');
             $table->string('email');
            $table->string('msg_body');
            $table->string('title');
            $table->string('sendind_to')->default("All");
            $table->string('status')->default("Active");
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
        Schema::dropIfExists('global_notifications');
    }
}
