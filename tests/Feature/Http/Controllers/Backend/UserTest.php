<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class UserTest extends TestCase
{

     // @return void


    public function test_users_index_page_status()
    {
        $response = $this->get('/dashboard');

        $response->assertOk();
    }

    public function test_users_index_goes_to_correct_view()
    {
        $response = $this->get('/dashboard');

        $response->assertViewIs("backend.users.index");
    }

    public function test_users_create_form_page_status()
    {
        $response = $this->get('/dashboard/create');

        $response->assertOk();
    }

    public function test_users_create_form_goes_to_correct_view()
    {
        $response = $this->get('/dashboard/create');

        $response->assertViewIs("backend.users.insert_form");
    }

    public function test_users_new_resource_is_created()
    {
        $generator = Container::getInstance()->make(Generator::class);

        $data = [
            "name" => $generator->name,
            "email" => $generator->email,
            "password" => Hash::make($generator->password),
            "is_admin" => $generator->boolean,
            "is_active" => $generator->boolean,
        ];

        $response = $this->post("/dashboard",$data);

        $response->assertRedirect("/dashboard");

    }

    public function test_users_existing_user_is_updated()
    {
        $user = User::all()->last();
        $user->name = "Updated " . $user->name;
        $user->email = "email." . $user->email;
        $data = $user->toArray();

        $response = $this->put('/dashboard/' . $user->user_id, $data);

        $response->assertRedirect('/dashboard');

    }

}
