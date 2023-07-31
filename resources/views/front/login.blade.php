<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <!-- 網站語系及語言宣告-->
    <meta http-equiv="content-language" content="zh-Hant-TW">
    <meta charset="UTF-8">
    <!-- RWD設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- 瀏覽器設定-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- 網站關鍵字-->
    <meta name="keywords" content="關鍵字">
    <!-- 網頁內容描述-->
    <meta name="description" content="描述">

    <title>使用者登入</title>

    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div class="container d-flex flex-column justify-content-between vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-body p-5">
                        <h3 class="text-dark mb-3 text-center">使用者登入</h3>
                        <form id="loginForm" method="post" action="{{ route('front.login.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4 {{ $errors->has('account') ? 'has-error' : '' }}">
                                    <input class="form-control" id="account" name="account" placeholder="帳號" type="text">
                                    @if ($errors->has('account'))
                                        <label id="account-error" class="error ml-3" for="account">{{ $errors->first('account') }}</label>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <input class="form-control" id="password" name="password" placeholder="密碼" type="password">
                                    @if ($errors->has('password'))
                                        <label id="password-error" class="error ml-3" for="password">{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block mb-4" type="submit">登入</button>
                                    <p><a class="text-blue" href="{{ route('front.register') }}">建立帳號</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    @if ($error = session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $error }}',
        })
    @endif
</script>
</html>