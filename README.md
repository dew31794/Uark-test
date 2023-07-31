# 需求版本

<pre>
PHP 7.3+
MariaDB 10.4
Laravel 8+
</pre>

# 如何安裝

1. Clone this repository
2. `composer install`
3. `cp .env.example .env`  修改資料庫設定 DB_DATABASE、DB_USERNAME、DB_PASSWORD
4. `php artisan key:generate`
5. `php artisan migrate --path=database/migrations/ --seed`  建立資料庫及現成資料
6. 執行專案 `php artisan serve`



## 專案細節
### 登入頁面
http://127.0.0.1:8000/login

未啟用帳號資訊
<pre>
帳號：admin
密碼：password
</pre>
status 欄位資訊
<pre>
0=未啟用
1=啟用
2=停用(暫無使用)
3=黑名單(暫無使用)
9=假刪除(暫無使用)
</pre>
### 建立帳號
http://127.0.0.1:8000/register
先填寫單位代號做查詢驗證，驗證完會有提示，再依序填寫下面資訊。

單位測試資料
<pre>
* 單位名稱(title) / 代號(org_no)：社會保險司 / MP102
* 單位名稱(title) / 代號(org_no)：護理及健康照護司 / MP104
* 單位名稱(title) / 代號(org_no)：保護健康司 / MP105
* 單位名稱(title) / 代號(org_no)：長期照顧司 / MP123
</pre>

![](https://hackmd.io/_uploads/B1hSR2Ejh.png)
