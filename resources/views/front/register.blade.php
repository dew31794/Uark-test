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

    <title>建立帳號</title>

    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
</head>
<body class="" id="body">
    <div class="container d-flex flex-column justify-content-between vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-body p-5">
                        <h3 class="text-dark mb-3 text-center">建立帳號</h3>
                        <span>* 必填項目</span>
                        <hr>
                        <form id="registerForm" method="post" action="{{route('front.register.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-4 {{ $errors->has('orgno') ? 'has-error' : '' }}">
                                    <input class="form-control" id="orgno" name="orgno" placeholder="* 單位代號" type="text" value="{{ old('orgno') }}">
                                    @if ($errors->has('orgno'))
                                        <label id="orgno-error" class="error ml-3" for="orgno">{{ $errors->first('orgno') }}</label>
                                    @endif
                                    <span class="search-result yes ml-3"></span>
                                    <span class="search-result no ml-3"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="button" class="btn btn-search" id="btn-search" value="查詢">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                        新增單位
                                    </button>
                                </div>
                                <div class="form-group col-md-12 mb-4 {{ $errors->has('orgid') ? 'has-error' : '' }}" hidden>
                                    <input class="form-control" id="orgid" name="orgid" placeholder="* 單位編號" type="text" value="{{ old('orgid') }}">
                                    @if ($errors->has('orgid'))
                                        <label id="orgid-error" class="error ml-3" for="orgid">{{ $errors->first('orgid') }}</label>
                                    @endif
                                </div>
                               
                                <div class="form-group col-md-12 mb-4 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <hr class="mt-3">
                                    <input class="form-control" id="name" name="name" placeholder="* 姓名" type="text" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <label id="name-error" class="error ml-3" for="name">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input class="form-control datepicker" id="birthday" name="birthday" placeholder="生日" type="text" value="{{ old('birthday') }}">
                                </div>
                                <div class="form-group col-md-12 mb-4 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input class="form-control" id="email" name="email" placeholder="* Email" type="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <label id="email-error" class="error ml-3" for="email">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4 {{ $errors->has('account') ? 'has-error' : '' }}">
                                    <input class="form-control" id="account" name="account" placeholder="* 帳號" type="text" value="{{ old('account') }}">
                                    @if ($errors->has('account'))
                                        <label id="account-error" class="error ml-3" for="account">{{ $errors->first('account') }}</label>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4 {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <input class="form-control" id="password" name="password" placeholder="* 密碼" type="password">
                                    @if ($errors->has('password'))
                                        <label id="password-error" class="error ml-3" for="password">{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4 {{ $errors->has('passwordCheck') ? 'has-error' : '' }}">
                                    <input class="form-control" id="passwordCheck" name="passwordCheck" placeholder="* 再次輸入密碼" type="password">
                                    @if ($errors->has('password'))
                                        <label id="passwordCheck-error" class="error ml-3" for="passwordCheck">{{ $errors->first('passwordCheck') }}</label>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 mb-4 {{ $errors->has('files') ? 'has-error' : '' }}">
                                    <input id="files" type="file" name="files[]" multiple />
                                    @if ($errors->has('files'))
                                        <label id="files-error" class="error ml-3" for="files">{{ $errors->first('files') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-primary btn-block mb-4" id="addUser">建立</a>
                                    <p><a class="text-blue" href="{{ route('front.login') }}">前往登入頁</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">新增單位</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" id="modal-form" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="rog-title" class="col-form-label">* 單位名稱：</label>
                            <input type="text" class="form-control" name="rog_title" id="rog-title">
                        </div>
                        <div class="form-group">
                            <label for="rog-no" class="col-form-label">* 單位代號：</label>
                            <input type="text" class="form-control" name="rog_no" id="rog-no">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary modal-save" id="modal-save">送出</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function () {
        $('#orgno').on('input',function(){
            $('#orgid').val('');
            $('.search-result').text('').hide();
        });
        $('.datepicker').datepicker({
            language: "zh-TW", // 中文化
            autoclose: true, // 選擇日期後就會自動關閉
            format: "yyyy-mm-dd" //設定格式為2023-07-31
        });

        $('#addUser').on('click',function(){
            if(!$('#orgid').val()!=""){
                alert('單位代號尚未進行查詢驗證');
            }else{
                $("form#registerForm").submit();
            }
        });

        $("#btn-search").on('click',function() {
            $('.search-result').text('').hide();

            var orgno = $("#orgno").val();

            if(!orgno){
                alert('請輸入單位代號');
            }

            var url = '/api/getOrg';
            $.ajax({
                url: url,
                method: 'GET',
                data: {org_no: orgno},
                dataType: 'json',
                async: false,
                cache: false,
                success: function (res) {
                    if(res){
                        $('.search-result.yes').text('有該單位').show();
                        $('#orgid').val(res);
                    }else{
                        $('.search-result.no').text('無該單位').show();
                    }
                },
                error: function(XmlHttpRequest, textStatus, errorThrown){
                    alert('Connection failed.');
                }
            });
        });

        $("#modal-save").on('click',function() {
            var orgtitle = $("#rog-title").val();
            var orgno = $("#rog-no").val();

            if(!orgno || !orgtitle){
                alert('請輸入單位名稱/代號');
            }

            var form = $('form#modal-form');

            var url = '/api/addOrg';
            $.ajax({
                url : url,
                method: 'POST',
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                // contentType: false,
                // processData: false,
                success:function(response) {
                    console.log(response);
                    if(response){
                        $('form#modal-form input').val('');
                        $('#addModal').modal('hide');
                        alert('單位新增成功');
                    }else{
                        alert('單位代號重複')
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
</html>