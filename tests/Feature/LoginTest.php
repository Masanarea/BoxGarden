<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
// use App\User;
use App\Models\User;
// use Tests\Feature\factory;
// use Database\Factories;

class LoginTest extends TestCase
{
    use RefreshDatabase;

   public function setUp(): void
   {
           parent::setUp();

        // テストユーザ作成
        //    $this->user = factory(User::class)->create();
        $loginUser = User::factory()->create();

        // $user = User::factory()->make();
        // dd($user);
   }


    /**
     * @test
     */
    public function should_URLでloginを検索できるか()
    {
        // $user = User::factory()->make();
        // dd($user);
        // $loginUser = User::factory()->create();
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function should_ログインユーザーが無事loginできるか()
    {
        // $user = User::factory()->make();
        // dd($user);
        // $loginUser = User::factory()->create();
        // $response = $this->post('/login', [
        //     'email' => $this->loginUser->email,
        //      'password' => 'Test12378'
        //     ]);
        // // リダイレクトで戻ってくる。
        // $response->assertStatus(200);
        $loginUser = User::factory()->create(); // Userモデルからfactory()を呼び出すことでユーザーを作成
        $request = $this->actingAs($loginUser)
                        ->get('/users');
        // dd($request);
        $request->assertOk();
    }

    /**
     * @test
     */
    public function should_ログインしていないユーザーが、ログインできないようになっているか()
    {
        // $user = User::factory()->make();
        // dd($user);
        // $loginUser = User::factory()->create();
        // $response = $this->post('/login', [
        //     'email' => $this->loginUser->email,
        //      'password' => 'Test12378'
        //     ]);
        // // リダイレクトで戻ってくる。
        // $response->assertStatus(200);
        $loginUser = User::factory()->create(); // Userモデルからfactory()を呼び出すことでユーザーを作成
        // $request = $this->actingAs($loginUser)
        // ->get('/users');
        $response = $this->get('/users');
        // dd($request);
        $response->assertStatus(302);
    }

    public function should_登録済みのユーザーを認証して返却する()
    {
        // $user = User::factory()->make();
        // dd($user);

        // $response = $this->json('POST', route('login'), [
        //     'email' => $this->user->email,
        //     // $this->user->password,でもいいけどね〜
        //     'password' => 'password',
        // ]);

        // $response
        //     ->assertStatus(200)
        //     ->assertJson(['name' => $this->user->name]);

        // $this->assertAuthenticatedAs($this->user);
    }

}


