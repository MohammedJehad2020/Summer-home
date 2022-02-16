<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->unsignedFloat('price')->default(0);
            $table->unsignedFloat('Size');
            $table->string('City');
            $table->integer('Bedrooms_count');
            $table->integer('Bathrooms_Count');
            $table->text('Description')->nullable();
            $table->string('Sales_agent_name');
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
        Schema::dropIfExists('homes');
    }
}
