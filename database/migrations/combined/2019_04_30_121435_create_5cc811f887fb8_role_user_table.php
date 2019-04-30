<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5cc811f887fb8RoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('role_user')) {
            Schema::create('role_user', function (Blueprint $table) {
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', 'fk_p_293407_293408_user_r_5cc811f888119')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_293408_293407_role_u_5cc811f8881e1')->references('id')->on('users')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
