<?php

namespace App\Http\Controllers\Admin;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function index($id = null){

        if(Auth::check()){
            if(!empty($id)){
                $post = Post::find($id);
                return redirect()->route('single-post', ['slug' => $post->slug, 'id' => $post->id]);
            }
            return redirect()->route('dashboard');
        }
        return view('screen.admin.login');
    }


    public function processLogin(Request $request){

        $remember = $request->input('remember') ? true : false;

        $validator = Validator::make($request->all(),[
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ],[
            'email.required'    => 'Email bắt buộc nhập',
            'email.email'       => 'Sai định dạng email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min'      => 'Độ dài mật khẩu lớn hơn 5'
        ]);

        if($validator->fails()){
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('error', 'Đăng nhập thất bại');
        }

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        }

        return redirect()->back();

    }

    public function logout(){
        session()->flush();
        auth()->logout();
        return redirect()->back();
    }


    #register

    public function formRegister(){
        return view('screen.admin.register');
    }

    public function processRegister(RegisterRequest $request){

        $data = $request->all();
        $data['role'] = 0 ;

            if($data['password'] === $data ['password-2']){
                User::create($data);
                return redirect()->route('login');
            }else{
                return redirect()->back()->with('error','password nhập lại không trùng khớp');
            }

    }

}
