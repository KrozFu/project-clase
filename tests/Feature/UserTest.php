<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show()
    {
        $response = $this->get('api/users/1');

        $response->assertStatus(200)
            ->asserJson(
                [
                    "id" => 4,
                    "name" => "Juan",
                    "email" => "juan@gmail.com",
                    "email_verified_at" => null,
                    "created_at" => null,
                    "updated_at" => null,
                    "role_id" => 1,
                    "profile" => [
                        "id" => 1,
                        "phone_number" => "3127845711",
                        "url_facebook" => "https://facebook.com/juan",
                        "created_at" => null,
                        "updated_at" => null,
                        "user_id" => 1
                    ]
                    // "role" => [
                    //     "id" => 1,
                    //     "name" => "Administrador",
                    //     "created_at" => null,
                    //     "updated_at" => null,
                    // ]
                ]
                // [
                //     "id" => 5,
                //     "name" => "Ramon",
                //     "email" => "ramon@gmail.com",
                //     "email_verified_at" => null,
                //     "created_at" => "2022-11-24 16:33:46",
                //     "updated_at" => "2022-11-24 16:33:46",
                //     "role_id" => 1
                // ],
            );
    }

    public function test_index()
    {
        $response = $this->get('api/users');

        $response->assertStatus(200)
            ->assertJson([
                [
                    "id" => 4,
                    "name" => "Juan",
                    "email" => "juan@gmail.com",
                    "email_verified_at" => null,
                    "created_at" => null,
                    "updated_at" => null,
                    "role_id" => 1
                ],
                [
                    "id" => 6,
                    "name" => "Ramon",
                    "email" => "ramon@gmail.com",
                    "email_verified_at" => null,
                    "created_at" => "2022-11-24 16:33:46",
                    "updated_at" => "2022-11-24 16:33:46",
                    "role_id" => 1
                ]
            ]);
    }
}
