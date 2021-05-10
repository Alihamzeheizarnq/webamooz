<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\User\Models\User;
use Tests\TestCase;

class RegitertionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_register_page()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_can_user_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('register'), [
            'name' => 'alihamzehei',
            'email' => 'alihamzehei2017@gmail.com',
            'mobile' => '09221534539',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $this->assertCount(1 , User::all());
    }
}
