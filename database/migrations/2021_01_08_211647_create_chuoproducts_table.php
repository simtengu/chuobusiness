<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuoproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuoproducts', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_category');
            $table->integer('product_price');
            $table->string('product_model')->nullable();
            $table->string('product_ram');
            $table->string('product_os');
            $table->string('product_camera')->nullable();
            $table->string('product_processor');
            $table->string('product_display')->nullable();
            $table->string('product_release_date')->nullable();
            $table->string('product_description')->nullable();
            $table->integer('brand_id');
            $table->integer('user_id');
            $table->integer('period_value')->nullable();
            $table->integer('period_id')->nullable();
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
        Schema::dropIfExists('chuoproducts');
    }
}
