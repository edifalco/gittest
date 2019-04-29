<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5cb745fa1b7765cb745fa1594fContentPageContentTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('content_page_content_tag');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('content_page_content_tag')) {
            Schema::create('content_page_content_tag', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('content_page_id')->unsigned()->nullable();
            $table->foreign('content_page_id', 'fk_p_293434_293433_conten_5cb7449652714')->references('id')->on('content_pages');
                $table->integer('content_tag_id')->unsigned()->nullable();
            $table->foreign('content_tag_id', 'fk_p_293433_293434_conten_5cb7449651e02')->references('id')->on('content_tags');
                
                $table->timestamps();
                
            });
        }
    }
}
