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
        Schema::table('asesmen', function (Blueprint $table) {
            $table->string('blanko',255)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('asesmen', function (Blueprint $table) {
            if (Schema::hasColumn('asesmen', 'blanko')) {
                 $table->dropColumn('blanko');
            }
             });
    }
};
