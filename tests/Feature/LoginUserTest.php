<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\User\Models\User;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_user_see_login_page()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }

    public function test_can_user_login_by_email()
    {
        $this->withoutExceptionHandling();

        $user = User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => bcrypt('123456789')
        ]);
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '123456789'
        ]);
        $this->assertAuthenticated();
    }

    public function test_can_login_user_by_mobil()
    {
        $this->withoutExceptionHandling();

        $user = User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'mobile' => '09221534539',
            'password' => bcrypt('123456789')
        ]);

        $user->markEmailAsVerified();

        $this->post(route('login'), [
            'email' => '09221534539',
            'password' => '123456789'
        ]);

        $home = $this->get(route('dashboard'));

        $home->assertOk();

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_not_verify_redirect_to_email_verify_route()
    {
        $this->withoutExceptionHandling();

        $user = User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'mobile' => '09221534539',
            'password' => bcrypt('123456789')
        ]);

        $this->post(route('login'), [
            'email' => '09221534539',
            'password' => '123456789'
        ]);

        $home = $this->get(route('dashboard'));

        $home->assertRedirect();

        $this->assertAuthenticatedAs($user);
    }
}
