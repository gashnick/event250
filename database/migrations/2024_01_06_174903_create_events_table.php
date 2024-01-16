<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->default('default_type_value');
            $table->date('date');
            $table->time('time');
            $table->string('venue');
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->unsignedBigInteger('organizer_id');
            $table->foreign('organizer_id')->references('id')->on('organizers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
