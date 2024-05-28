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
<<<<<<<< HEAD:database/migrations/2024_05_27_183027_nn.php
        //
========
        Schema::table('commanddes', function (Blueprint $table) {
            //
            $table->string('etat')->default('en_traitement');
        });
>>>>>>>> 4c245a5734c413397f6ccc6def528e156cc00b3f:database/migrations/2024_05_27_161530_add_etat_to_commanddes_table.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2024_05_27_183027_nn.php
        //
========
        Schema::table('commanddes', function (Blueprint $table) {
            //
            $table->dropColumn('etat');
        });
>>>>>>>> 4c245a5734c413397f6ccc6def528e156cc00b3f:database/migrations/2024_05_27_161530_add_etat_to_commanddes_table.php
    }
};
