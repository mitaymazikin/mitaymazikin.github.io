<?php
$fio = htmlspecialchars($_POST['fio']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$date = htmlspecialchars($_POST['date']);
$range = htmlspecialchars($_POST['send-result-polzunok']);
$errors = array();

if ($_POST) {
    if ($fio == '') {
        $errors[] = 'Заполните поле : ФИО';
    }elseif (!preg_match("/^[a-zа-яё\d]{1}[a-zа-яё\d\s]*[a-zа-яё\d]{1}$/i", $fio)) {
        $errors[] = 'Поле ФИО не может содержать цифры или знаки';
    }elseif ((mb_strlen($fio) > 20 || mb_strlen($fio) < 2)) {
        $errors[] = 'ФИО от 2 - х до 20 символов';
    }
    if ($phone == '') {
        $errors[] = 'Номер телефона пуст';
    }
    if (isset($_FILES) && $_FILES['file']['error'] === 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $allowedfileExtensions = array('pdf','doc','docx');
        if (!in_array($fileExtension, $allowedfileExtensions)) {
            $errors[] = 'Допустимый формат файла: .doc, .docx, .pdf';
        }
    }
    if ($range === '') {
        $errors[] = 'Количество не выбрано';
    }elseif ($range < 20 || $range > 80) {
        $errors[] = 'Число от 20 до 80';
    }



}elseif (count($errors) === 0) {
    $servarName = 'localhost';
    $dbName = 'save_form_test';
    $userName = 'root';
    $passUser = '2891957donald';


    //Сообщение на почту
    $msgEmail = "Данные сообщения:\r\n";
    $msgEmail .= "Email: \r\n";
    $msgEmail .= "Телефон: \r\n";
    $msgEmail .= "Дата: \r\n";
    $msgEmail .= "Количество: \r\n";
}


echo json_encode($errors);

?>