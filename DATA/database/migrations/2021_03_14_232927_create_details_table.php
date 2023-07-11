<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('app')->unique();            
            $table->text('description')->nullable();;
            $table->decimal('regular_price');
            $table->text('unity');
            $table->string('SKU');            
            $table->enum('payment_status',['pendiente','completado']);
            $table->unsignedInteger('quantity')->default(10);
            $table->unsignedBigInteger('category_id')->nullable()->unsigned();
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
        Schema::dropIfExists('details');
    }
}
