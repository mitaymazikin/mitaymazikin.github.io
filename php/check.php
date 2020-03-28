<?php
header('Content-Type: form/multipart');
set_time_limit(120000);

$fio    = htmlspecialchars($_POST['fio']);
$phone  = htmlspecialchars($_POST['phone']);
$email  = htmlspecialchars($_POST['email']);
$date   = htmlspecialchars($_POST['date']);
$file   = $_FILES['file'];
$range  = htmlspecialchars($_POST['send-result-polzunok']);
$errors = array();

if (!$_POST['check']) {
    //проверяем поля формы
    if ($fio === '') {
        $errors[] = 'Заполните поле : ФИО';
    }elseif ( strlen($fio) < 2 || strlen($fio) > 20) {
        $errors[] = 'Кол-во символов от 2 до 20';
    }
    if ($phone === '') {
        $errors[] = 'Номер телефона пуст';
    }
    if ($range === '') {
        $errors[] = 'Количество не выбрано';
       // $errors[] =  $file['error'];
    } elseif ($range < 20 || $range > 80) {
        $errors[] = 'Количество: от 20 до 80';
    }

    //переводим тесктовое значение даты в формат даты

    if ($date != '') {
        $transferDate = strtotime($date);
        $returnDate = date("Y-m-d", $transferDate);
    }

    //проверяем поля формы

    //проверка загрузки файла
    if (!empty($file)) {
        if($file['error'] === 1) {
            $errors[] = 'Файл превышает 5мб';
        }
        if ($file['error'] === 0) {
            $fileTmpPath           = $_FILES['file']['tmp_name'];
            $fileName              = $_FILES['file']['name'];
            $fileSize              = $_FILES['file']['size'];
            $fileType              = $_FILES['file']['type'];
            $fileNameCmps          = explode(".", $fileName);
            $fileExtension         = strtolower(end($fileNameCmps));
            $newFileName           = md5(time() . $fileName) . '.' . $fileExtension;
            $allowedfileExtensions = array('pdf', 'doc', 'docx');

            $fileLoadDir = $_SERVER['DOCUMENT_ROOT']  .  '/tmp/' .  $newFileName ;

            //если файл не соответствует массиву форматов
            if (!in_array($fileExtension, $allowedfileExtensions)) {
                $errors[] = 'Допустимый формат файла: .doc, .docx, .pdf';
            }
            //если файл прошел проверку переносим его из временной папки в постоянную
            if (in_array($fileExtension, $allowedfileExtensions)){
                move_uploaded_file($fileTmpPath, $fileLoadDir );
            }
        }
    }
    //конец проверки загрузки файла

    //если ошибок нету подключаемся к базе и отправляем на почту данные
    if (count($errors) === 0){
        $serverName = 'localhost';
        $dbName     = 'save_form_test';
        $userName   = 'root';
        $passUser   = '2899157donald';
        $conn       = mysqli_connect($serverName, $userName, $passUser, $dbName);
        if (!$conn) {
            $errors[] = ("Ошибка подключения к базе: " . mysqli_connect_error());
        }else {
            mysqli_set_charset($conn, "utf8");
        }

        $sql = "INSERT INTO save_form (name, phone, email,file,date,rage) VALUES ('$fio','$phone','$email','$fileLoadDir','$returnDate','$range' )";
        if (mysqli_query($conn, $sql)) {
            //$errors[] = "Запись сделана";
        } else {
            $errors[] = "Ошибка: " . mysqli_error($conn);
        }
        mysqli_close($conn);

        $to = 'mityamazikin@gmail.com';
        $from = 'training@dmitry.ru';
        $themeMail = 'Тренинг-форма';
        //Сообщение на почту
        $msgEmail = "Данные сообщения:\r\n";
        $msgEmail .= "ФИО:" . $fio . " \r\n";
        $msgEmail .= "Email:" . $email . " \r\n";
        $msgEmail .= "Телефон:" . $phone .  "\r\n";
        $msgEmail .= "Дата:" . $returnDate . " \r\n";
        $msgEmail .= "Количество:" . $range .  "\r\n";

        $mailSend = mail($to, $themeMail , $msgEmail,$from);

        if ( $mailSend === true) {
            $mailSend;
        }else {
            $errors[] = 'письмо не отправилось';
        }
    }
}
echo json_encode($errors);

?>