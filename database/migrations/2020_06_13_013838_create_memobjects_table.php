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
            $table->enum('type',config('memobjsettings.mem_obj_allowed_types'));
            $table->string('uri',256);
            //$table->binary('data');
            $table->integer('ttl');
            $table->string('tags',64);
            $table->string('acl',64);
            $table->boolean('useOnlyOnce');
            $table->softDeletes('deleted_at', 0);
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
