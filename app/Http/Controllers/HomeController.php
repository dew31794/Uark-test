<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * 建構子
     */
    public function __construct()
    {
        $this->_config = request('_config');
    }

    /**
     * 預設轉址
     */
    public function index()
    {
        return redirect()->route('front.login');
    }
}
