<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAPIEndpoints()
    {
				$response = $this->get('/');
				$response->assertStatus(200);

				$response = $this->get('/client');
				$response->assertStatus(200);

				$response = $this->get('/order');
				$response->assertStatus(200);

				$response = $this->get('/product');
				$response->assertStatus(200);

    }
}
