<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id');
            $table->string('p_name');
            $table->string('p_code');
            $table->string('p_color');
            $table->text('description');
            $table->float('price');
            $table->string('image');
            $table->timestamps();
        });*/

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id');
            $table->string('p_type');
            $table->string('p_name');
            $table->string('p_code')->unique('slug');
            $table->tinyInteger('p_status')->default(0);
            $table->string('image')->nullable();
            $table->text('p_description')->nullable();
            $table->float('p_price')->nullable();
            $table->flaot('p_pricemp2')->nullable();
            $table->string('p_currency');
            $table->string('p_negotiable')->default(0);
            $table->integer('p_rooms')->nullable();
            $table->integer('p_baths')->nullable();
            $table->integer('p_balconies')->nullable();
            $table->integer('p_hallways')->nullable();
            $table->string('p_typeof')->nullable();
            $table->string('p_furniture')->nullable();
            $table->string('p_material')->nullable();
            $table->integer('p_floor')->nullable();
            $table->integer('p_totalfloors')->nullable();
            $table->float('p_totalsurface')->nullable();
            $table->float('p_usablesurface')->nullable();
            $table->integer('p_year')->nullable();
            $table->string('p_condition')->nullable();
            $table->tinyInteger('p_cadastre')->default(0);
            $table->tinyInteger('p_tabulate')->default(0);
            $table->string('p_address')->nullable();
            $table->string('p_addresslat')->nullable();
            $table->string('p_addresslon')->nullable();
            $table->string('p_neighborhood')->nullable();
            $table->string('p_seokeys')->nullable();
            $table->string('p_seodescription')->nullable();
            $table->string('p_clientname')->nullable();
            $table->string('p_clientphone')->nullable();
            $table->string('p_clientaddress')->nullable();
            $table->text('p_clientdescription')->nullable();
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
