<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class APIEndpointTest extends TestCase
{

		//TODO truncate database before running tests on database

    public function testClient()
    {
				$response = $this->get('/client');
				$response->assertStatus(200);
    }

		public function testProduct()
    {
				$response = $this->get('/product');
				$response->assertStatus(200);
    }

		public function testOrder(){
			$response = $this->get('/order');
			$response->assertStatus(200);
		}

		public function testOrder1()
		{
			$response = $this->json('post', '/order', json_decode(file_get_contents(__DIR__ . '/APIEndpointTest_order_json_post_client_1_order_1.json'), true));
			$response->assertStatus(200);
		}

		public function testOrder1IsInDatabase(){
			$this->assertDatabaseHas('clients', [
			 'name' => 'Thiago'
	 		]);

			$this->assertDatabaseHas('products', [
			 'name' => 'Mobile'
	 		]);

			$order= \App\Order::find(1);
			$this->assertEquals(1, $order->id);
		}

		public function testOrder2()
		{
			$response = $this->json('post', '/order', json_decode(file_get_contents(__DIR__ . '/APIEndpointTest_order_json_post_client_1_order_2.json'), true));
			$response->assertStatus(200);
		}

		public function testOrder3()
		{
			$response = $this->json('post', '/order', json_decode(file_get_contents(__DIR__ . '/APIEndpointTest_order_json_post_client_1_order_3.json'), true));
			$response->assertStatus(200);
		}
}
