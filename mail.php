<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$theme = $_POST['user_theme'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.kuzmitskaya.by';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@kuzmitskaya.by'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'kuzmitskaya2021'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('admin@kuzmitskaya.by'); // от кого будет уходить письмо?
$mail->addAddress('juljakuzmitskaja@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Тема заявки: ' .$theme;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
   echo "<script>
   alert('Запрос успешно отправлен!'); 
   window.history.go(-1);
   </script>";
}
?>