<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('file')->nullable();
            $table->string('video')->nullable();
            $table->integer('user_id');
            $table->enum('selected',[0,1])->default(0);
            $table->enum('status',[0,1])->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv_infos');
    }
}
