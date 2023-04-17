<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use DatabaseMigrations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $collection) {
            $collection->id();
            $collection->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $collection->string('title');
            $collection->enum('type',['text','image','videos'])->default('text');
            $collection->enum('status',['publish','trash','ban','draft'])->default('publish');
            $collection->text('body')->nullable();
            $collection->string('image')->nullable();
            $collection->string('video')->nullable();
            // TODO relation
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
