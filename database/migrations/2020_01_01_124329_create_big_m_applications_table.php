<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigMApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('big_m_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('applicant_name');
            $table->string('email');
            $table->text('mailing_address');
            $table->unsignedBigInteger('division_name');
            $table->unsignedBigInteger('district_name');
            $table->unsignedBigInteger('upzila_name');
            $table->text('address_details');
            $table->boolean('lang_bangla');
            $table->boolean('lang_english');
            $table->boolean('lang_french');
            $table->string('photo');
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('big_m_applications');
    }
}
