<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregando Campos a la tabla Users.
            $table->string('phone', 25)->nullable()->after('email');
            $table->smallInteger('status')->default(1)->after('phone');
            $table->smallInteger('role_id')->nullable()->after('status');
            // ->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('set null')
            // ->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     //
        //     // $table->dropForeign('role_id');
        //     // $table->dropColumn("role_id");
        //     $table->dropColumnIfExits(['phone', 'status']);
        // });
    }
}
