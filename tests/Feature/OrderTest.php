<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use Tests\TestCase;

class OrderTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic test registration.
     *
     * @return void
     */
    public function testOrder()
    {
        $this->createProduct();

        $data = [
            'product_id' => 1,
            'quantity' => 2,
        ];

        $response = $this->post('/api/order', $data);

        $response->assertStatus(201)
            ->assertJson(['message' => 'You have successfully ordered this product.']);
    }

    public function testUnavailableStock()
    {
        $this->createProduct();

        $data = [
            'product_id' => 1,
            'quantity' => 99999,
        ];

        $response = $this->post('/api/order', $data);

        $response->assertStatus(400)
            ->assertJson(['message' => 'Failed to order this product due to unavailability of the stock']);;

    }
 

    public function createProduct()
    {
        // $user = Product::create([
        //     'name' => 'Prod 1',
        //     'available_stock' => 2,
        // ]);

        $user = Product::factory()->count(3)->create();
    }

}
