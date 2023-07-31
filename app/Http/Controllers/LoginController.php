<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models;
use Carbon\Carbon;
use DB;
use Hash;
use Session;

class LoginController extends Controller
{
    /**
     * 建構子
     */
    public function __construct()
    {
        $this->_config = request('_config');
    }

    /**
     * 顯示頁面
     */
    public function index()
    {
        return view($this->_config['view']);
    }

    /**
     * 登入身分驗證
     */
    public function login(Request $request)
    {
        $messages = [
            'account.required'  => '請輸入帳號。',
            'password.required' => '請輸入密碼。',
            'password.min'      => '密碼須為6個字元以上，15個字元以下。',
            'password.max'      => '密碼須為6個字元以上，15個字元以下。',
        ];
        $validator = Validator::make($request->all(), [
            'account' => 'required',
            'password' => 'required|min:6|max:15'
        ],$messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->withinput($request->input())->withErrors($errors);
        }

        $account = $request->input('account');
        $password = $request->input('password');

        if (!auth()->attempt(['account' => $account,'password' => $password])){
            session()->flash('error', '您所輸入的資料不正確');
            return redirect()->back();
        }

        if (!auth()->user()->status==1) {
            session()->flash('error', '此帳號待審核開通');
            return redirect()->back();
        }

        return redirect()->route($this->_config['redirect']);
    }
}
