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
        Schema::create('apis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('main_dealer_id')->unsigned();
            $table->bigInteger('back_end_id')->unsigned();
            $table->bigInteger('feature_id')->unsigned();
            $table->string('method')->nullable();
            $table->string('path')->nullable();
            $table->longText('headers')->nullable();
            $table->longText('body')->nullable();
            $table->longText('params')->nullable();
            $table->boolean('is_check_status_code')->default(0);
            $table->integer('status_code_actual')->nullable();
            $table->boolean('status_code_validation')->default(1);
            $table->bigInteger('status_code_id')->unsigned();
            $table->boolean('is_check_response_time')->default(0);
            $table->float('response_time_actual')->nullable();
            $table->float('response_time_tolerance')->default(0);
            $table->boolean('response_time_validation')->default(1);
            $table->bigInteger('response_time_id')->unsigned();
            $table->boolean('is_check_response_body')->default(0);
            $table->longText('response_body_actual')->nullable();
            $table->boolean('response_body_validation')->default(1);
            $table->bigInteger('response_body_id')->unsigned();
            $table->boolean('is_push_email')->default(0);
            $table->integer('priority')->default(0);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('apis');
    }
};
