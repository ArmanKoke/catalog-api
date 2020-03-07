<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',\App\Item::NAME_COLUMN_LENGTH);
            $table->integer('price',false,true);
            $table->text('description');
            $table->mediumInteger('weight',false,true)->nullable(); //in grams
            $table->string('color')->nullable(); //todo limit char or use int, or make separate link to colors table
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
        Schema::dropIfExists('items');
    }
}
