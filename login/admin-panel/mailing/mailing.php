<?
include("../../../DB.php");
if (isset($_POST['action']) && $_POST['action'] == "add_new_mailing") {
    $email = $_POST['email'];
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
    } else {
        $login = 'NULL';
    }

    $result = add_new_mailing($email, $login);
    if ($result == 1) {
        echo "Подписка успешно оформлена.";
    } elseif ($result == -1) {
        echo "На данную почту уже оформленна подписка.";
    } else {
        echo "Ошибка!";
    }
}
if (isset($_POST['action']) && $_POST['action'] == "SEND_MAILING") {
    $results = add_mailing_articles();
    require '../../../libs/PHPMailer/PHPMailer.php';
    require '../../../libs/PHPMailer/SMTP.php';
    require '../../../libs/PHPMailer/Exception.php';
    $title = "GameNews - Главное за неделю.";
    $body = "";

    foreach ($results as $result) {

        $title_art = $result['title'];
        $pubdate = $result['pubdate'];
        $full_text = $result['full_text'];
        $game = get_games_by_id($result["games_id"]);
        $game = $game['name_game'];


        //Основное тело сообщения
        $body .= "
        <div>
             <h2>$title_art</h2>
               <div>
                 <span>$pubdate</span>
                 <span>$game></span>
               </div>
               <div>
                   $full_text
               </div>
        </div><br>
        ";
    }
    $emails = add_mailing_emails();
    foreach($emails as $email){

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        try {
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth   = true;
            //$mail->SMTPDebug = 2;
            $mail->Debugoutput = function ($str, $level) {
                $GLOBALS['status'][] = $str;
            };

            // Настройки вашей почты
            $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
            $mail->Username   = 'cool.55652014@yandex.ru'; // Логин на почте
            $mail->Password   = '713232x5X'; // Пароль на почте
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            $mail->setFrom('cool.55652014@yandex.ru', 'GameNews'); // Адрес самой почты и имя отправителя

            // Получатель письма

            $mail->addAddress($email['email']);



            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $body;



            // Проверяем отравленность сообщения
            if ($mail->send()) {
                $result = "success";
                
            } else {
                $result = "error";
                
            }
        } catch (Exception $e) {
            $result = "error";
            $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
        }
        //echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
        
    }
    echo "Рассылка прошла успешно.";
}
