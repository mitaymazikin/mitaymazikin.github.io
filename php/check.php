<?php
$fio = htmlspecialchars($_POST['fio']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$date = htmlspecialchars($_POST['date']);
$range = htmlspecialchars($_POST['range']);
$errors = array();


//$_FILES
//$_POST

echo json_encode($_POST);

//Сообщение на почту
/*   $msgEmail = nl2br("Данные сообщения:\r\n", false);
   $msgEmail .= nl2br("Email: \r\n" . $email, false);
   $msgEmail .= nl2br("Телефон: \r\n" . $phone, false);
   $msgEmail .= nl2br("Дата: \r\n" . $date, false);
   $msgEmail .= nl2br("Количество: \r\n" . $range, false);*/

//проверка полей на валидацию
/* if ($fio == '') {
     $errors[] = 'Заполните поле : ФИО';
 }elseif (!preg_match("/^[a-zа-яё\d]{1}[a-zа-яё\d\s]*[a-zа-яё\d]{1}$/i", $fio)) {
     $errors[] = 'Поле ФИО не может содержать цифры или знаки';
 }elseif ((mb_strlen($fio) > 20 || mb_strlen($fio) < 2)) {
     $errors[] = 'Ощибка: ФИО от 2 - х до 20 символов';
 }
 if ($phone == '') {
     $errors[] = 'Заполните поле : Номер телефона';
 }
 if (count($errors) > 0) {
     foreach ($errors as $err) {
         echo  json_encode($err, JSON_UNESCAPED_UNICODE);
     }

 }*/
?>