<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->integer('cv_id');
            $table->string('twitter',50)->nullable();
            $table->enum('twitter_check',[0,1])->default(0);
            $table->string('instagram',50)->nullable();
            $table->enum('instagram_check',[0,1])->default(0);
            $table->string('facebook',50)->nullable();
            $table->enum('facebook_check',[0,1])->default(0);
            $table->string('medium',50)->nullable();
            $table->enum('medium_check',[0,1])->default(0);
            $table->string('linkedin',50)->nullable();
            $table->enum('linkedin_check',[0,1])->default(0);
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
        Schema::dropIfExists('social_media');
    }
}
