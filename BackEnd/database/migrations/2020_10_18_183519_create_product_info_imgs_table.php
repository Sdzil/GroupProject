<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfoImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_info_imgs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('imageUrl');
            $table->unsignedInteger('sort');
            $table->unsignedBigInteger('product_main_img_id');
            $table->foreign('product_main_img_id')->references('id')->on('product_main_imgs');

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
        Schema::dropIfExists('product_info_imgs');
    }
}
