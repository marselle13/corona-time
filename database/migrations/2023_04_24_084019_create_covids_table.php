<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('covids', function (Blueprint $table) {
			$table->id();
			$table->string('code');
			$table->json('name');
			$table->string('country');
			$table->Integer('confirmed')->unsigned();
			$table->Integer('recovered')->unsigned();
			$table->Integer('critical')->unsigned();
			$table->Integer('deaths')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('covids');
	}
};
