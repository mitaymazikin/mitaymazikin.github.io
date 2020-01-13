<!doctype html>
<html lang="Ru" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="<?php mb_internal_encoding("UTF-8"); ?>>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap CSS-->
    <title>Форма обратной связи</title>
</head>
<body>
<div class="container">

    <form id="toForm" method="POST" name="check" enctype="multipart/form-data">
        <h1 class="col-sm-12 text-center">Заполните форму, пожалуйста!</h1>
        <div class="errors"></div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Введите ФИО:</label>
            <div class="col-sm-4">
                <input name="fio" type="text" class="form-control" id="inputFio"  placeholder="Введите ФИО" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Номер телефона</label>
            <div class="col-sm-4">
                <input name="phone" type="tel" class="form-control" id="inputPhone" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
                <input name="email" type="email" class="form-control" id="inpuEmail" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label >Загрузите файл:</label>
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="50000" /> -->
            <input name="file" type="file" class="form-control-file" id="files">
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Дата:</label>
            <div class="col-sm-4">
                <input name="date" type="text" class="form-control" id="inputDate">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Количество:</label>
            <div class="col-sm-4">
                <div id="slider">
                    <div id="custom-handle" class="ui-slider-handle" name="range"></div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 ">
                <button type="submit" id="submit" name="check_submit" class="btn btn-success">Отправить</button>
            </div>
        </div>
    </form>

</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script src="/js/main.js"></script>
<script src="/js/filecheck.js"></script>
</body>
</html>