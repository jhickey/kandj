<?php

class Create_Tables {

	public function up()
	{
		Schema::create('guests', function($table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->text('message');
			$table->text('address');
			$table->text('email');
			$table->boolean('status');
			$table->timestamps();
		});
	}
	
	public function down()
	{
		Schema::drop('guests');
	}

}