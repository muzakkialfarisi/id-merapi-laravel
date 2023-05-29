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
        Schema::create('user_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('menu_group')->nullable();
            $table->string('menu_id')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('menu_name')->nullable();
            $table->string('menu_icon_class')->nullable();
            $table->string('menu_key')->nullable();
            $table->string('route')->nullable();
            $table->string('to')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_menus');
    }
};
