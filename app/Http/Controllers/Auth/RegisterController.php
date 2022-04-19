<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth\Registered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // RegistersUsers トレイト内のregisterメゾットをオーバーライドする！
    // 基本laravel/ui内のものは変更しないルールがあるため
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // $request->all() を $request に、またregister をオーバーライド,理由は$request->all() の場合、配列で渡してしまうから
        // 配列で何かしら表示したい場合でも $request でまずは受け取っておいて、その後今回のように $request $request->all() で受け取れば何も問題なく受け取れるし、より汎用性がある
        event(new Registered($user = $this->create($request)));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
        ? new JsonResponse([], 201)
        : redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    protected function create(Request $request)
    {
        // 画像アップロード機能追加
        // dd($request->all());
        // 文字列を受け取る場合
        // $request->input('name');
        // 写真の場合
        // まず名前受け取り
        // getClientOriginalName() でオリジナルの名前を受け取る
        // ただし，悪意のあるユーザーによりファイル名や拡張子が改竄される可能性があるため，
        // getClientOriginalNameとgetClientOriginalExtensionメソッドは
        // 安全であると考えられないことに注意してください。
        // そのため，アップロードされたファイルの名前と拡張子を取得するには，
        // 通常，hashNameメソッドとextensionメソッドを使用するべきです。
        $fileName = $request->file('image')->getClientOriginalName();
        // ストレージクラス（storage）画像やファイル操作を簡単にしてくれる！使うことでS3とかに簡単に送れる
        // フォルダーを指定して画像を保存
        // 使い方は公式より断然キータの記事の方がわかりやすかった！
        Storage::putFileAs(
            'public/images',
            $request->file('image'),
            // 拡張子なし、名前のみだが、ハッシュ化していないため安全でなくやや危ない
            $fileName
        );
        $fullFilePath = '/storage/images/'. $fileName;

        // func register() で $request->all() を
        //  $request にしたため、 追加で記述剃ることになった
        $data =$request->all();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'img_url' => $fullFilePath,
        ]);
    }
}
