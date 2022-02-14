<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFacebookAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_facebook_ads', function (Blueprint $table) {
            $table->id();
            $table->text('page_link');
            $table->text('post_link');
            $table->integer('dollar');
            $table->string('target_audience');
            $table->string('age_group');
            $table->string('gender');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('request_facebook_ads');
    }
}
