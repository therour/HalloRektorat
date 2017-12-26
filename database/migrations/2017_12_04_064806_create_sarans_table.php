<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->integer('target_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->enum('status', ['send', 'noticed', 'responded', 'done'])->default('send');
            $table->enum('is_public', ['private', 'public'])->default('public');
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
        Schema::dropIfExists('sarans');
    }
}
