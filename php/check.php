<?php
$fio    = htmlspecialchars($_POST['fio']);
$phone  = htmlspecialchars($_POST['phone']);
$email  = htmlspecialchars($_POST['email']);
$date   = htmlspecialchars($_POST['date']);
$file   = $_FILES['file'];
$range  = htmlspecialchars($_POST['send-result-polzunok']);
$errors = array();

if (!$_POST['check']) {
    if ($fio === '') {
        $errors[] = 'Заполните поле : ФИО';
    } elseif (!preg_match("/^[a-zа-яё\d]{1}[a-zа-яё\d\s]*[a-zа-яё\d]{1}$/i", $fio)) {
        $errors[] = 'Поле ФИО не может содержать цифры или знаки';
    } elseif ((mb_strlen($fio) > 20 || mb_strlen($fio) < 2)) {
        $errors[] = 'ФИО от 2 - х до 20 символов';
    }
    if ($phone === '') {
        $errors[] = 'Номер телефона пуст';
    }
    if (!empty($file) && $file['error'] === 0) {
        $fileTmpPath           = $_FILES['file']['tmp_name'];
        $fileName              = $_FILES['file']['name'];
        $fileSize              = $_FILES['file']['size'];
        $fileType              = $_FILES['file']['type'];
        $fileNameCmps          = explode(".", $fileName);
        $fileExtension         = strtolower(end($fileNameCmps));
        $newFileName           = md5(time() . $fileName) . '.' . $fileExtension;
        $allowedfileExtensions = array('pdf', 'doc', 'docx');
        if (!in_array($fileExtension, $allowedfileExtensions)) {
            $errors[] = 'Допустимый формат файла: .doc, .docx, .pdf';
        }
        move_uploaded_file($fileTmpPath, 'tmp/' . $fileName);
    }
    if ($range === '') {
        $errors[] = 'Количество не выбрано';
    } elseif ($range < 20 || $range > 80) {
        $errors[] = 'Количество: от 20 до 80';
    }
    if ($date != '') {
        $transferDate = strtotime($date);
        $returnDate = date("Y-m-d", $transferDate);
    }
    if (count($errors) === 1){
        $servarName = 'localhost';
        $dbName     = 'save_form_test';
        $userName   = 'root';
        $passUser   = '2899157donald';
        $conn       = mysqli_connect($servarName, $userName, $passUser, $dbName);
        if (!$conn) {
            $errors[] = ("Ошибка подключения к базе: " . mysqli_connect_error());
        }else {
            mysqli_set_charset($conn, "utf8");
        }

        $sql = "INSERT INTO save_form (name, phone, email,file,date,rage) VALUES ('$fio','$phone','$email','$file','$returnDate','$range' )";
        if (mysqli_query($conn, $sql)) {
           // $errors[] = "Запись сделана";
        } else {
            $errors[] = "Ошибка: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        $to = 'mityamazikin@gmail.com';
        $themeMail = 'Тренинг-форма';
        //Сообщение на почту
        $msgEmail = "Данные сообщения:\r\n";
        $msgEmail .= "Email:" . $email . " \r\n";
        $msgEmail .= "Телефон:" . $phone .  "\r\n";
        $msgEmail .= "Дата:" . $returnDate . " \r\n";
        $msgEmail .= "Количество:" . $range .  "\r\n";

        $mailSend = mail($to, $themeMail , $msgEmail);

        if ( $mailSend === true) {
            $mailSend;
        }else {
            $errors[] = 'письмо не отправилось';
        }
    }
}

echo json_encode(array(
    'errors' => $errors,
    'file'=> $fileTmpPath
                 ));

?>