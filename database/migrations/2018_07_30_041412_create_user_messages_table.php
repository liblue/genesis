<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
            //                      
        $table->increments('id',11);  
        $table->string('content',255);
        $table->integer('user_id');  
        $table->integer('admin_id');  
        $table->integer('comuser_id');  
        $table->integer('article_id');
        $table->string('is_read')->default('未读');
        $table->string('created_at');
        $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_messages');
    }
}
