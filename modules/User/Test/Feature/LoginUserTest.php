<?php

    namespace Tests\Feature;

    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Modules\User\Models\User;
    use Tests\TestCase;

    class LoginUserTest extends TestCase
    {
        use RefreshDatabase, WithFaker;

        /**
         * A basic feature test example.
         *
         * @return void
         */
        public function test_can_user_login_page()
        {
            $response = $this->get(route('login'));
            $response->assertStatus(200);
        }

        public function test_user_login_by_email()
        {
            User::create([
                'name' => $this->faker->name,
                'email' => 'alihamzehei@gmail.com',
                'password' => bcrypt('123456789')
            ]);
            $this->post(route('login'), [
                'email' => 'alihamzehei@gmail.com',
                'password' => '123456789'
            ]);
            $responses = $this->get(route('dashboard'));

            $responses->assertRedirect(route('verification.notice'));
            $this->assertAuthenticated();


        }
    }
