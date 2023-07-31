<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
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
}
