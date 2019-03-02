<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminGroupsTable extends Migration {

	public function up() {
		Schema::create('admin_groups', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('name');
				$table->timestamps();
			});
	}


	public function down() {
		Schema::dropIfExists('admin_groups');
	}
}
