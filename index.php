<!doctype html>
<html lang="Ru">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
  <!-- Bootstrap CSS-->

  <!-- Optional JavaScript -->
  <script src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
  <script src="/js/main.js"></script>



  <!-- Optional JavaScript -->

  <title>Отправка заполненной формы</title>
</head>
<body>
  <div class="container">

    <form action="/php/validatorEmail.php" id="toForm" class="container_form" method="post">
      <h1 class="col-sm-12 text-center">Заполните форму, пожалуйста!</h1>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Введите ФИО:</label>
        <div class="col-sm-4">
          <input name="fio" type="text" class="form-control" id="inputFio"  placeholder="Введите ФИО">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Укажите номер телефона</label>
        <div class="col-sm-4">
          <input name="phone" type="tel" class="form-control" id="inputPhone"  placeholder="+7 (999) 999-99-99">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
          <input name="email" type="email" class="form-control" id="inpuEmail" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Загрузите файл:</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Дата:</label>
        <div class="col-sm-4">
          <input name="fio" type="text" class="form-control" id="inputDate">
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Количество:</label>
          <div class="col-sm-4">
            <input type="range" min="0" max="100" step="1" value="50"> 
          </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6Le8D7UUAAAAAJXHDdAY_FlWAWhVeVgKjU7Wnz8Q"></div>
        <div class="text-danger" id="recaptchaError"></div>
        <div class="form-group row">
          <div class="col-sm-12 ">
            <button type="submit" class="btn btn-primary text-center">Отправить</button>
          </div>
        </div>
      </form>

    </div>  
    
    
    
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  </html>