<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('profile_id');
            $table->integer('comment_id');
            $table->integer('rate')->default(0);
            $table->enum('platform', ['android', 'ios', 'web']);
            $table->string('comment');
            $table->enum('status',['0','1'])->default('1');
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
        Schema::dropIfExists('profile_comments');
    }
}
