<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categories_index_page_status()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }
    public function test_categories_index_goes_to_correct_view()
    {
        $response = $this->get('/categories');

        $response->assertViewIs("backend.categories.index");
    }

    public function test_categories_create_form_page_status()
    {
        $response = $this->get('/categories/create');

        $response->assertOk();
    }

    public function test_categories_create_form_goes_to_correct_view()
    {
        $response = $this->get('/categories/create');

        $response->assertViewIs("backend.categories.insert_form");
    }

    public function test_categories_new_resource_is_created()
    {
        $suffix = Str::random();
        $data = [
            "name" => "Deneme kategorisi-" . $suffix,
            "slug" => "Deneme-kategorisi-" . $suffix
        ];

        $response = $this->post('/categories', $data);
        $response->assertRedirect("/categories");

    }

    public function test_categories_existing_user_is_updated()
    {
        $category = Category::all()->last();
        $category->name = "Updated " . $category->name;
        $category->slug = "Updated " . $category->slug;
        $data = $category->toArray();

        $response = $this->put('/categories/' . $category->category_id, $data);

        $response->assertRedirect('/categories');

    }

}
