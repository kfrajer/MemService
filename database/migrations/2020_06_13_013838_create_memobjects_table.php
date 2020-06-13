<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemobjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mem_objects', function (Blueprint $table) {
            $table->id();
            $table->string('name',128);
            $table->text('description');
            $table->enum('type',array('text/plain','text/html','text/csv','text/css','text/xml','application/javascript','application/pdf','application/octet-stream','application/json','application/zip','application/x-www-form-urlencoded','image/gif','image/jpeg','image/png','image/tiff','image/svg+xml','multipart/mixed','multipart/form-data'));
            $table->string('uri',256);
            //$table->binary('data');
            $table->integer('ttl');
            $table->string('tags',64);
            $table->string('acl',64);
            $table->softDeletes('deleted_at', 0);
            $table->boolean('useOnlyOnce');
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
        Schema::dropIfExists('mem_objects');
    }
}
