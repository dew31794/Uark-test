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


class RegisterController extends Controller
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
     * 註冊送出
     */
    public function store(Request $request)
    {
        $messages = [
            'orgno.required'    => '請輸入單位代號',
            'orgno.required_with' => '單位代號尚未做查詢',
            'orgid.required'    => '請輸入單位編號',
            'name.required'     => '請輸入姓名。',
            'name.min'          => '姓名需兩個字以上。',
            'email.required'    => '請輸入電子郵件。',
            'email.email'       => '請輸入正確的電子郵件格式。',
            'account.required'  => '請輸入帳號。',
            'account.min'       => '帳號須為5個字元以上，15個字元以下。',
            'account.max'       => '帳號須為5個字元以上，15個字元以下。',
            'account.unique'    => '該帳號已存在，請重新輸入。',
            'password.required' => '請輸入密碼。',
            'password.min'      => '密碼須為6個字元以上，15個字元以下。',
            'password.max'      => '密碼須為6個字元以上，15個字元以下。',
            'password.confirmed'=> '密碼與密碼確認輸入不一致，請重新輸入',
            'password.same'     => '密碼與再次輸入密碼不一致，請重新輸入',
            'passwordCheck.required'=> '請再次輸入密碼。',
            'passwordCheck.same'=> '密碼與再次輸入密碼不一致，請重新輸入',
            'files.required'    => '請上傳檔案。',
        ];
        $validator = Validator::make($request->all(), [
            'orgno'         => 'required|required_with:orgid',
            'orgid'         => 'required',
            'name'          => 'required|min:2',
            'email'         => 'required|email',
            'account'       => 'required|min:5|max:15|unique:users',
            'password'      => 'required|min:6|max:15|same:passwordCheck',
            'passwordCheck' => 'required|same:password',
            'files'          => 'required',
        ],$messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->withinput($request->input())->withErrors($errors);
        }

        $request['org_id'] = 1;
        $request['password'] = Hash::make($request->password);

        $data = $request->except(['_token','passwordCheck','filename','file']);

        $user = Models\User::create($data);

        if($user->id){
            foreach($request['files'] as $file){
                $folder = 'user';
                $date = Carbon::now()->format('dmY-his');
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileSize = $file->getSize();

                if (!is_dir(storage_path('/app/public/uploads/' . $folder . '/' . $user->id))) {
                    $folder_full  = storage_path('/app/public/uploads/' . $folder . '/' . $user->id);
                    if (!is_dir($folder_full)) mkdir($folder_full, 0777, true);
                }

                $path = storage_path('/app/public/uploads/' . $folder . '/' . $user->id);

                $destinationPath = $path;
                $original        = md5('user-' . $date.$fileName) . '.' . $extension;
                $file->move($destinationPath, $original);

                $file_data = [
                    'user_id' => $user->id,
                    'file_path' => '/uploads/' . $folder . '/' . $user->id . '/' . $original
                ];

                $file_result = Models\ApplyFile::create($file_data);
            }

            return redirect()->route($this->_config['redirect']);
        }else{
            session()->flash('error', '程式發生錯誤');
            return redirect()->back();
        }
    }

    /**
     * 轉向成功頁面
     */
    public function success()
    {
        return view($this->_config['view']);
    }

    /**
     * 單位組織查詢驗證
     */
    public function getOrgStatus(Request $request)
    {
        $data = Models\Org::where('org_no', $request->org_no)->first();

        return $data?$data->id:0;
    }

    /**
     * 新增單位
     */
    public function addOrg(Request $request)
    {
        $data = Models\Org::where('org_no', $request->rog_no)->first();
        if(!$data){
            $data = [
                'title' => $request->rog_title,
                'org_no' => $request->rog_no
            ];

            $result = Models\Org::create($data);
        }else{
            $result = '';
        }

        return $result?$result->id:0;
    }
}
