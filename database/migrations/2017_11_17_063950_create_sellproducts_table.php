<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellproducts', function (Blueprint $table) {
            $table->increments('productid');
            $table->text('productname');
            $table->text('providername');
            $table->text('provideremail');
               $table->biginteger('providerphone');


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
        Schema::drop('sellproducts');
    }
}
