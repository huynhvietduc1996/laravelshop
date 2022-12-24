<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('p_name');
            $table->string('p_slug')->index()->unique();
            $table->double('p_price')->default(0);
            $table->double('p_price_entry')->default(0)->comment('Giá nhập');
            $table->integer('p_category_id')->default(0);
            $table->integer('p_admin_id')->default(0);
            $table->tinyInteger('p_sale')->default(0);
            $table->string('p_avatar')->nullable();
            $table->integer('p_view')->default(0);
            $table->tinyInteger('p_hot')->index()->default(0);
            $table->tinyInteger('p_active')->index()->default(1);
            $table->integer('p_pay')->default(0);
            $table->text('p_description')->nullable();
            $table->text('p_content')->nullable();
            $table->integer('p_review_total')->default(0);
            $table->integer('p_review_star')->default(0);

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
        Schema::dropIfExists('products');
    }
}
