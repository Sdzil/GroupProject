<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('imageUrl');//圖片路徑
            $table->string('description')->nullable();//描述，讓業主自己記得這張圖的用途
            $table->string('link')->nullable();//圖片是否有要連結到額外的連結
            $table->string('target')->default('_blank');//對於連結的開啟方式
            $table->unsignedInteger('sort');//排序

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
        Schema::dropIfExists('banners');
    }
}
