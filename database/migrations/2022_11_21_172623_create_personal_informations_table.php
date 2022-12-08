<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_informations', function (Blueprint $table) {
            $table->id();
            $table->integer('cv_id');
            $table->timestamp('date_of_birth')->nullable();
            $table->enum('date_of_birth_check',[0,1])->default(0);
            $table->string('nl_number',20)->nullable();
            $table->string('nl_file',100)->nullable();
            $table->enum('nl_number_check',[0,1])->default(0);
            $table->string('city_of_birth',50)->nullable();
            $table->enum('city_of_birth_check',[0,1])->default(0);
            $table->string('driving_licence',10)->nullable();
            $table->string('driving_licence_file',100)->nullable();
            $table->enum('driving_licence_check',[0,1])->default(0);
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
        Schema::dropIfExists('personal_informations');
    }
}
