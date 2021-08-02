<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Testing\TestResponse;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a new product can be created successfully
     *
     * @return void
     */
    public function test_adding_a_new_product()
    {
        $newProduct = [
            'product_name' => $this->faker->text(100),
            'product_description' => $this->faker->paragraph()
        ];

        $response = $this->postJson(
            '/api/products',
            $newProduct
        );

        $response->assertStatus(201);

        $this->assertDatabaseHas('products', $newProduct);
    }

    /**
     * Test an existing product can be updated successfully
     *
     * @return void
     */
    public function test_updating_an_existing_product()
    {
        $existingProduct = Product::factory()->create();

        $requestPayload = [
            'product_id' => $existingProduct->product_id,
            'product_name' => $this->faker->text(100),
            'product_description' => $this->faker->paragraph()
        ];

        $response = $this->putJson(
            '/api/products/' . $existingProduct->product_id,
            $requestPayload
        );

        $this->assertDatabaseHas('products', $requestPayload);
    }
}
