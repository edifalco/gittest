<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5cc811f84dbd2RelationshipsToUserActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_actions', function(Blueprint $table) {
            if (!Schema::hasColumn('user_actions', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '293425_5cb74045610ae')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_actions', function(Blueprint $table) {
            if(Schema::hasColumn('user_actions', 'user_id')) {
                $table->dropForeign('293425_5cb74045610ae');
                $table->dropIndex('293425_5cb74045610ae');
                $table->dropColumn('user_id');
            }
            
        });
    }
}
