<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('path');
            $table->string('name');
            $table->string('extension');
            $table->string('mimetype');
            $table->bigInteger('size')->unsigned();
            $table->text('metadata')->nullable();

            $table->string('type')->index()->nullable();
            $table->integer('directory_id')->unsigned()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('media');
    }

}
