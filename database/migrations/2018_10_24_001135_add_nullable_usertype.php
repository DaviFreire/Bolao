<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableUsertype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement('ALTER TABLE `users` 
                        CHANGE `usertype_id` `usertype_id` TINYINT(4) NULL,
                        CHANGE `vinculo_id` `vinculo_id` INT(11) NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::statement('ALTER TABLE `users` 
                        CHANGE `usertype_id` `usertype_id` TINYINT(4) NOT NULL,
                        CHANGE `vinculo_id` `vinculo_id` INT(11) NOT NULL');
    }
}
