<?php
header('Content-Type: text/html; charset=UTF-8');

define('SITE_KEY', '6LfQB7kUAAAAABsyEVki2K2yYHZG7MBwNz7izDUw');
define('SECRET_KEY', '6LfQB7kUAAAAAIR7POfnIW4WAZeNbgqdd_rgNQy0');

function getCaptcha($SecretKey) {
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }

if ($_POST) {
var_dump($_FILES);
    $fio = $_POST['fio'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $range = $_POST['range'];
    $errors = array();

    //Сообщение на почту
    $msgEmail = nl2br("Данные сообщения:\r\n", false);//r n указан не правильно
    $msgEmail .= nl2br("Имя: \r\n" . $fio, false);
    $msgEmail .= nl2br("Email: \r\n" . $email, false);
    $msgEmail .= nl2br("Телефон: \r\n" . $phone, false);
    $msgEmail .= nl2br("Дата: \r\n" . $date, false);
    $msgEmail .= nl2br("Количество: \r\n" . $range, false);
   
    //проверка полей на валидацию
    if (htmlspecialchars($fio) == ''){
        $errors[] = 'Заполните поле : ФИО';
    }
    if (!preg_match("/^[a-zа-яё\d]{1}[a-zа-яё\d\s]*[a-zа-яё\d]{1}$/i", $fio) ) {
        $errors[] = 'Поле ФИО не может содержать цифры или знаки';
    }
    if (mb_strlen($fio) < 2 ||  mb_strlen($fio) !== 20){
        $errors[] = 'Ощибка: ФИО от 2 - х до 20 символов';
    }
    if (htmlspecialchars($phone) == ''){
        $errors[] = 'Заполните поле : Номер телефона';
    }

    if(isset($_FILES)) {

        $allowedTypes = array('.doc','.docx','.pdf');

        $uploadDir = "php/"; //Директория загрузки. Если она не существует, обработчик не сможет загрузить файлы и выдаст ошибку

        for($i = 0; $i < count($_FILES['file']['name']); $i++) { //Перебираем загруженные файлы

        $uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);

        $fileChecked[$i] = false;

        echo $_FILES['file']['name'][$i]." | ".$_FILES['file']['type'][$i]." — ";

        for($j = 0; $j < count($allowedTypes); $j++) { //Проверяем на соответствие допустимым форматам

    if($_FILES['file']['type'][$i] == $allowedTypes[$j]) {

        $fileChecked[$i] = true;

        break;

        }

    }

    if($fileChecked[$i]) { //Если формат допустим, перемещаем файл по указанному адресу

    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {

        echo "Успешно загружен <br>";

    } else {

    echo "Ошибка ".$_FILES['file']['error'][$i]."<br>";

    }   

    } else {

        echo "Недопустимый формат <br>";

        }

    }

    } else {

        echo "Вы не прислали файл!" ;

    }

    $Return = getCaptcha($_POST['g-recaptcha-response']);
    
    if($Return->success !== true && $Return->score < 0.5){
       $errors[] = 'Ой! Кажется вы робот!';
    }
    
    if ( $file > $_FILES['MAX_FILE_SIZE'] ){
         $errors[] = 'Ошибка: Файл не более 5 мб';
     }
    
    
    if ( $range < 20 ) {
        $errors[] = 'Ошибка: Количество от 20 до 80';
    }
   if (count($errors) > 0) {
        
        $outErrors = '<div class="errors">';
        foreach ($errors as $err) {
          $outErrors .= $err.'<br>';
        }
        $outErrors .= '</div>';
        echo $outErrors;
        die;  
    }

}else {
    $checkMail = mail('mityamazikin@gmail.com', 'Новое сообщение', $msgEmail);
    $mysql = new mysqli('localhost','u0727235_admin','don@ld2899157','u0727235_gg');// установить кодировку
    $mysql->query("SET NAMES 'utf-8'");
    $mysql->query("INSERT INTO `form` (`date`, `email`, `fio`, `file`, `phone`, `inputrng`) VALUES('$date', '$email', '$fio', '$file', '$phone', '$range') "); //ошибка синтаксиса

    $mysql->close();
}




//сделать уникальный Id таблицы 
//запись должна идти при заполненных
}else {
    $checkMail = mail('mityamazikin@gmail.com', 'Новое сообщение', $msgEmail);
    $mysql = new mysqli('localhost','u0727235_admin','don@ld2899157','u0727235_gg');// установить кодировку
    $mysql->query("SET NAMES 'utf-8'");
    $mysql->query("INSERT INTO `form` (`date`, `email`, `fio`, `file`, `phone`, `inputrng`) VALUES('$date', '$email', '$fio', '$file', '$phone', '$range') "); //ошибка синтаксиса

    $mysql->close();
}


?>