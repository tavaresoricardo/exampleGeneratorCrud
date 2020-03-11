<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/products';

    /**
     * @test
     */
    public function checkRequiredFields()
    {
        $response = $this->post(self::BASE_URI, []);

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('value');
        $response->assertSessionHasErrors('category_id');
    }

    /**
     * @test
     */
    public function productCanBeCreated()
    {
        $productFake = factory(Product::class)->make();

        $response = $this->post(self::BASE_URI, $productFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Product::all());

        $this->assertDatabaseHas('products', $productFake->getAttributes());
    }

    /**
     * @test
     */
    public function productCanBeUpdated()
    {
        $productFakes = factory(Product::class, 2)->make();
        $this->post(self::BASE_URI, $productFakes->first()->toArray());

        $product  = Product::first();

        $response = $this->put(self::BASE_URI . '/' . $product->id, $productFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('products', $productFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function productCanBeDeleted()
    {
        $productFake = factory(Product::class)->make();
        $this->post(self::BASE_URI, $productFake->toArray());

        $this->assertCount(1, Product::all());

        $product  = Product::first();

        $response = $this->delete(self::BASE_URI . '/' . $product->id);

        $response->assertStatus(302);
        $this->assertCount(0, Product::all());

        $this->assertDatabaseMissing('products', $productFake->getAttributes());
    }
}
