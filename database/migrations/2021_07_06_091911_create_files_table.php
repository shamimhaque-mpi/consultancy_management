<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('service_id');
            $table->text('tax_id');

            $table->string('designation')->nullable();
            $table->string('name')->nullable();
            $table->string('common')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('ordinary_or_standard_isee')->nullable();
            $table->string('isee_universita')->nullable();
            $table->string('isee_for_minors')->nullable();
            $table->string('isee_socio_sanitario')->nullable();
            $table->string('current_isee')->nullable();
            $table->string('household')->nullable();
            $table->string('house_rent_property_other')->nullable();
            
            $table->string('status')->default('pending');
            $table->date('date')->default(DB::raw('NOW()'));
            $table->tinyInteger('trash')->default(0);
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
        Schema::dropIfExists('files');
    }
}
