<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\Models\ProductImage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductImageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_images_index_page_status()
    {
        $response = $this->get('/products/1/images');
        $response->assertStatus(200);
    }

    public function test_images_index_url_goes_to_correct_view()
    {
        $response = $this->get('/products/1/images');
        $response->assertViewIs("backend.images.index");
    }

    public function test_images_create_form_page_status()
    {
        $response = $this->get('/products/1/images/create');
        $response->assertOk();
    }

    public function test_images_create_form_goes_to_correct_view()
    {
        $response = $this->get('/products/1/images/create');
        $response->assertViewIs("backend.images.insert_form");
    }

    public function test_images_new_resource_is_created()
    {
        $image = UploadedFile::fake()->image('product.jpg');
        $data = [
            "product_id" => 1,
            "image_url" => $image,
            "alt" => "Test alt alanı",
            "seq" => 222
        ];


        $response = $this->post('/products/1/images', $data);

        $response->assertRedirect("/products/1/images");

        Storage::disk('local')->assertExists("public/products/" . $image->hashName());
    }

    public function test_images_existing_resource_is_updated()
    {
        $productImage = ProductImage::all()->last();
        $productImage->alt = "Edited " . $productImage->alt;
        $id = $productImage->image_id;
        $data = $productImage->toArray();

        $image = UploadedFile::fake()->image('product.jpg');
        $data["image_url"] = $image;

        $response = $this->put('/products/1/images/' . $id, $data);
        $response->assertRedirect("/products/1/images");
    }

}
