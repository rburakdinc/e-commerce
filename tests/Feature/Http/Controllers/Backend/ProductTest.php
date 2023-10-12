<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_products_index_page_status()
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }
    public function test_products_index_goes_to_correct_view()
    {
        $response = $this->get('/products');

        $response->assertViewIs("backend.products.index");
    }

    public function test_products_create_form_page_status()
    {
        $response = $this->get('/products/create');

        $response->assertOk();
    }

    public function test_products_create_form_goes_to_correct_view()
    {
        $response = $this->get('/products/create');

        $response->assertViewIs("backend.products.insert_form");
    }

    public function test_products_new_resource_is_created()
    {
        $suffix = Str::random();
        $data = [
            "category_id" => 999,
            "name" => "Deneme ürünü-" . $suffix,
            "price" => 99.99,
            "lead" => "Kısa açıklama" . $suffix,
            "slug" => "Deneme ürünü-" . $suffix
        ];

        $response = $this->post('/products', $data);
        $response->assertRedirect("/products");

    }

    public function test_products_new_resource_is_created_optional_fields()
    {
        $suffix = Str::random();
        $data = [
            "category_id" => 999,
            "name" => "İndirimli ürün" . $suffix,
            "price" => 99.99,
            "old_price" => 199.99,
            "lead" => "Kısa açıklama" . $suffix,
            "slug" => "Deneme ürünü-" . $suffix
        ];

        $response = $this->post('/products', $data);
        $response->assertRedirect("/products");

    }

    public function test_products_existing_user_is_updated()
    {
        $product = Product::all()->last();
        $product->name = "Updated " . $product->name;
        $product->slug = "Updated " . $product->slug;
        $data = $product->toArray();

        $response = $this->put('/products/' . $product->product_id, $data);

        $response->assertRedirect('/products');

    }

}

