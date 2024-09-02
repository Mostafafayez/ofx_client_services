<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');  // English


            $table->string('company_name')->nullable();  // English


            $table->text('mission')->nullable();  // English
            $table->text('mission_ar')->nullable();  // Arabic

            $table->text('vision')->nullable();  // English
            $table->text('vision_ar')->nullable();  // Arabic

            $table->text('about_us')->nullable();  // English
            $table->text('about_us_ar')->nullable();  // Arabic
            $table->string('additional_info')->nullable();



            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
