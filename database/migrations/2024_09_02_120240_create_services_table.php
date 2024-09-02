<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');

            $table->string('service_name');  // English
            $table->string('service_name_ar')->nullable();  // Arabic

            $table->text('description')->nullable();  // English
            $table->text('description_ar')->nullable();  // Arabic

            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
