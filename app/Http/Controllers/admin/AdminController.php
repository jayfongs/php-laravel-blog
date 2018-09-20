<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * 后台首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin/home');
    }

    /**
     * 登录页面
     */
    public function login()
    {
       return view('admin/login');
    }


    /**
     * 登录处理
     */
    public function loginPost(Requests\LoginFormRequest $request)
    {
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (\Auth::attempt($credential)){
            $user = \Auth::user();
            $user->last_login_ip = $request->ip();
            $user->save();
            return redirect()->to('/admin');
        } else {
            return redirect()->back()->with('msg', '用户名或者密码错误!');
        }
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        /*session(['user' => null]);
        return redirect('/admin/login');*/
    }
    
    /**
     * 修改密码
     */
    public function password()
    {
        return view('admin/password');
    }

    /**
     * 修改密码处理
     */
    public function passPost(Requests\PasswordFormRequest $request)
    {
        /*$input = $request->all();
        $validator = Validator::make($input, $request->messages());
        if ($validator->passes()){
            $user = User::first();

            //明码
//            $password = $user->password;

            //加密
            $password = \Crypt::decrypt($user->password);
            if ($input['password'] == $password){
                $user->password = \Crypt::encrypt($input['new_password']);
                $user->update();
                return back()->withErrors('密码修改成功！');
            }else {
                return back()->withErrors('原密码错误！');
            }
        }else {
            return back()->withErrors($validator);
        }*/

    }
}
