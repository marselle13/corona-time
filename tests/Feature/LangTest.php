<?php

namespace Tests\Feature;

use Tests\TestCase;

class LangTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	public function test_switch_language()
	{
		$response = $this->post('/language', ['locale' => 'ka']);
		$response->assertRedirect();
		$this->assertEquals('ka', app()->getLocale());
		$this->assertEquals('ka', session()->get('locale'));
	}
}
