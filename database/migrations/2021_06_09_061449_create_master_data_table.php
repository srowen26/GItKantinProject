<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('listmenu');
            $table->timestamps();
        });

        Schema::create('master_item', function (Blueprint $table) {
            $table->increments('item_id');
            $table->foreignId('menu_id')->constrained('master_data');
            $table->string('item');
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
        Schema::dropIfExists('master_data');

        Schema::dropIfExists('item_data');
    }
}
