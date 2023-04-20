<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		User::create([
			'username'          => 'nika',
			'email'             => 'nika@redberry.ge',
			'email_verified_at' => now(),
			'password'          => bcrypt('1234'),
		]);
	}
}
