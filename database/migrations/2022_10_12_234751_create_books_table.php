<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("isbn", 15)->unique();
            $table->string("title");
            $table->string("description")->nullable();
            $table->date("publish_date")->nullable();
            $table->unsignedBigInteger("category_id");//->nullable();
            $table->unsignedBigInteger("editorial_id");//->nullable();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("editorial_id")->references("id")->on("editorials");
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
