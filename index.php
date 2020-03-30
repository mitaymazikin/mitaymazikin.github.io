<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="<?php mb_internal_encoding("UTF-8"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap CSS-->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?render=6Lf_LOIUAAAAALGzJItq9XRKUBYV6Eh56TUCwauR'></script>
    <title>Форма обратной связи</title>
</head>
<body>
    <div class="container">
        <form id="toForm" method="POST" name="check" enctype="multipart/form-data">
            <h1 class="col-sm-12 text-center">Заполните форму, пожалуйста!</h1>
            <div id="errors"></div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Введите ФИО:</label>
                <div class="col-sm-4">
                    <input name="fio" type="text" class="form-control" id="inputFio" placeholder="Введите ФИО">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Номер телефона</label>
                <div class="col-sm-4">
                    <input name="phone" type="tel" class="form-control" id="inputPhone"
                           placeholder="+7 (999) 99 99 999">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input name="email" type="email" class="form-control" id="inpuEmail" placeholder="example@mail.ru">
                </div>
            </div>
            <div class="form-group">
                <label>Загрузите файл:</label>
                <input name="file" type="file" class="form-control-file" id="files">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Дата:</label>
                <div class="col-sm-4">
                <input name="date" type="text" class="form-control" id="inputDate">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Количество:</label>
            <div class="col-sm-4">
                <input type="hidden" name="send-result-polzunok" id="send-result-polzunok" />
                <div id="polzunok"></div>
                <span style="color:green" id="result-polzunok"></span>
            </div>
            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
        </div>
            <div class="form-group row">
                <div class="col-sm-12 ">
                    <button type="submit" id="submit" name="check_submit" class="btn btn-success">Отправить</button>
                </div>
            </div>
        </form>
        <div id="success"></div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
</body>
</html>