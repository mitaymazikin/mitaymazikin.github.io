<!doctype html>
<html lang="Ru">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
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

    <form action="php/check.php" id="toForm" method="POST" enctype="multipart/form-data">
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
        <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
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
          
          <input type="text" name="range" id="amount" readonly >
            <div id="sliderRange"></div>
        </div>
      </div>
      <div class="form-group row">
      <!-- рекаптча -->
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
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
  <script src="https://www.google.com/recaptcha/api.js?render=6LfQB7kUAAAAABsyEVki2K2yYHZG7MBwNz7izDUw"></script>
  <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfQB7kUAAAAABsyEVki2K2yYHZG7MBwNz7izDUw', {action: 'homepage'}).then(function(token) {
                //console.log(token);
                document.getElementById('g-recaptcha-response').value=token;
            });
        });
    </script>
  
</body>
</html>