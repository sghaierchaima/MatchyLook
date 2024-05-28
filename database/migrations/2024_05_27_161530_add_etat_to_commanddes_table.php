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
        Schema::table('commanddes', function (Blueprint $table) {
            //
            $table->string('etat')->default('en_traitement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commanddes', function (Blueprint $table) {
            //
            $table->dropColumn('etat');
        });
    }
};
