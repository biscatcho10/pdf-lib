<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('host_id');
            $table->string('host_name');
            $table->unsignedBigInteger('meeting_id');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamp('start_time');
            $table->integer('duration')->comment('in minutes');
            $table->string('password')->nullable();
            $table->text('start_url');
            $table->text('join_url');
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
        Schema::dropIfExists('online_events');
    }
}
