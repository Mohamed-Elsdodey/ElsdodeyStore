<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $sql=[
            [
                'id'=>1,
                'name'=>'Mohamed Elsdodey',
                'email'=>'admin@admin.com',
                'password'=>bcrypt(123456),
            ]
        ];
        \Illuminate\Support\Facades\DB::table('admins')->insert($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
