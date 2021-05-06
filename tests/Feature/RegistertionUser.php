<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\User\Models\User;
use Tests\TestCase;

class RegistertionUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_register_page()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_user_register()
    {
        $this->withoutExceptionHandling();

        $response = $this->post(route('register') , [
            'name' => 'alihamzehei',
            'email' => 'alihamzehei2017@gmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789'
         ]);
        $response->assertRedirect(route('dashboard'));
        $this->assertCount(1 , User::all());
    }

    public function test_user_confirm_email()
    {
        $this->withoutExceptionHandling();

        $response = $this->post(route('register') , [
            'name' => 'alihamzehei',
            'email' => 'alihamzehei2017@gmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789'
        ]);
        $response->assertRedirect(route('dashboard'));
        $responses = $this->get(route('dashboard'));
        $responses->assertRedirect(route('verification.notice'));
    }
    public function test_user_can_verified_account()
    {
        $this->withoutExceptionHandling();

        $user = User::create([
           'name' => 'alihamzehei',
           'email' => 'alihamzehei2017@gmail.com',
           'password' => bcrypt('123456789')
        ]);
        $user->markEmailAsVerified();
        auth()->loginUsingId($user->id);
        $responses = $this->get(route('dashboard'));
        $responses->assertOk();
    }
}
