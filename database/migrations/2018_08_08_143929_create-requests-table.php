<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->enum('service_type', ['police', 'towing', 'fire', 'hospital']);
            $table->float('latitude');
            $table->float('longitude');
            $table->enum('status', ['requested', 'in-progress', 'done'])->default('requested');
            $table->float('distance');
            $table->integer('account_id');
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('account')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
