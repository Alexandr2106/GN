<?php
require '../../libs/PHPMailer/PHPMailer.php';
require '../../libs/PHPMailer/SMTP.php';
require '../../libs/PHPMailer/Exception.php';



$title = "GameNews - Проверка электронной почты";

$body = "
<div style='background-color:#070304;'>
    <table style='background: ##070304; color: white; margin: auto; margin-bottom: 40px; margin-top: 20px;'>
        <tbody>
            <tr>
                <td valign='iddle'align='center' class='panel_mr_css_attr'>
                    <div class='expand_mr_css_attr'>
                        <div>
                            <a href='#' target='_blank'>
                                <img align='none' alt='GameNews' border='0' hspace='0' src='https://i.yapx.ru/RwynC.png' style='max-width: 70px; width: 80px; height: auto; display: block;margin: 0px; margin-bottom: 40px; margin-top: 40px;' vspace='0' width='55px' data-title='GameNews'>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>

        <tbody>
            <tr>
                <td><div style='width: 100%; text-align: center; font-family: sans-serif; color: #ffffff; font-size: 26px; line-height: 32px; line-height: 100%; letter-spacing: 2px; margin-bottom: 15px;'>Ваш новый пароль:</div></td>
            </tr>
            <tr>
                <td><div style='width: 100%; text-align: center; font-family: sans-serif; color: #000000; font-size: 26px; line-height: 50px; letter-spacing: 5px; background: #ffffff; font-weight: bold;'>$result</div></td>
            </tr>
        </tbody>
    </table>

    <table width='500' class='panel-padded_mr_css_attr/' border='0' cellpadding='0' cellspacing='0' style='min-width:400px; background-color: white; margin: auto; padding: 20px 0 20px;'>
        <tbody>
            <tr>
                <td width='50'>&nbsp;</td>
                <td align='left' style='font-family: arial,helvetica,sans-serif;font-size:14px;color:#202020;line-height:19px;line-height: 134%;' class='MsoNormal_mr_css_attr'>
                    <div style='font-family: arial,helvetica,sans-serif;font-size:14px;color:#202020;line-height:19px;letter-spacing: .5px;' class='MsoNormal_mr_css_attr'>
                        Здравствуйте,

                        <br><br>

                        Вы можете войти в свою учётную, используя указнный выше пароль.
                                                
                        <br><br>

                        Спасибо,<br>Команда GameNews.

                        <br>
                           
                    </div>
                </td>
                <td width='50'>&nbsp;</td>
            </tr>
            <td width='50'>&nbsp;</td>
        </tbody>
    </table>
    <table style='background-color:#070304; width: 500px; margin: auto; margin-top: 20px;'>
        <tr height='50'>
            <td width='50'>&nbsp;</td>
            <td align='center' class='panel-padded_mr_css_attr'>
                <div style='font-family: arial, helvetica, sans-serif;font-size:10px;color: #8a8a8a;
                text-align: center;line-height: 12px;' class='MsoNormal_mr_css_attr'>
                    <p>  
                    © 2021 GameNews.ru. Использование любых материалов сайта без согласования с администрацией запрещено.
                    </p>
                </div>
            </td>
            <td width='50'>&nbsp;</td>
        </tr>
    </table>
</div>
";





$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'cool.55652014@yandex.ru'; // Логин на почте
    $mail->Password   = '713232x5X'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('cool.55652014@yandex.ru', 'GameNews'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress($email);  



// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;  



// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
//echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
