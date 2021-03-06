<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_teams', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('original_id')->unique()->unsigned();
            $table->string('name', 50);
            $table->integer('organization_id')->unsigned();
            $table->timestamps();
            $table->foreign('organization_id')->references('original_id')->on('core_organizations');
            $table->unique(['name', 'organization_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_teams');
    }
}
