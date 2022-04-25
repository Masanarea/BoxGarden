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
        // 下はlaravel6とかの書き方で、８からは通用しない
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
    public function should_ログインユーザーが正しい入力値で無事loginできるか()
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

        $loginUser = User::factory()->create();
        // 複数の場合、下（laravel8）
        // $users = User::factory()->count(3)->make();

        // Quote laravel.com
        // If you would like to override some of the default values of your models,
        //  you may pass an array of values to the make method.
        //  Only the specified attributes will be replaced
        // while the rest of the attributes remain set
        // to their default values
        //  as specified by the factory:

        // 例文（練習）
        // $user = User::factory()->make([
        //     'name' => 'Abigail Otwell',
        // ]);
        

        // Userモデルからfactory()を呼び出すことでユーザーを作成
        $request = $this->actingAs($loginUser)
                        ->get('/users');
        // dd($request);
        $request->assertOk();

        // $loginUser = User::factory()->create();

        // $response = $this->json('POST', route('login'), [
        //     'email' => $this->$loginUser->email,
        //     // $this->user->password,でもいいけどね〜
        //     'password' => 'password',
        // ]);

        // $response->assertStatus(200)
        //         ->assertJson(['name' => $this->loginUser->name]);

        // $this->assertAuthenticatedAs($this->loginUser);


    }

    /**
     * @test
     */
    public function should_ダメなパスワードで、ログインできない状態になっているか()
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
    public function should_間違ったメアドで、ログインできない状態になっているか()
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
        // 302はlaravelのデフォルトでのリダイレクトナンバー
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
            // ->assertJson(['name' => $this->user->name]);

        // $this->assertAuthenticatedAs($this->user);
    }

}


