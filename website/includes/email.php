<?php
    require_once("../includes/config.php");
    require_once("../includes/cipher.php");
    header("Content-Type: text/html; charset=utf-8");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../includes/PHPMailer/src/Exception.php';
    require '../includes/PHPMailer/src/PHPMailer.php';
    require '../includes/PHPMailer/src/SMTP.php';

    $encToSend=encryptMyEmail($email);
        $mail = new PHPMailer(true);
        try {
                //Server settings
                $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                //after setting the mail server
                $mail->Host       = 'mail.kazcenter.com';                   // Specify main and backup SMTP servers
                //after setting the mail server
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'admin@kazcenter.com';                  // SMTP username
                $mail->Password   = 'MyPasswordIsLit2021!';                      // SMTP password
                $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                $mail->Port       = 465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('admin@kazcenter.com', 'kazcenter admin');
                $mail->addAddress($email);               // Name is optional
                $mail->addReplyTo('admin@kazcenter.com', 'kazcenter admin', 'Information');
                $mail->addCC('admin@kazcenter.com', 'kazcenter admin');
                $mail->addBCC('admin@kazcenter.com', 'kazcenter admin');


                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = '=?utf-8?B?'.base64_encode('Құпия сөзді қалпына келтіру').'?=';
                $mail->Body    ="<h4>Құрметті қолданушы,</h4><p>Сіздің аккаунтыңздың құпия сөзін алмастыруға рұқсат сұралды</p><p>Егер бұл сіз болмасаңыз бұл хабарламаға назар аудармаңыз, немесе:</p>Сіз мына сілтеме арқылы құпия сөзіңізді алмастыра аласыз<a href=".$config['url']."/login/restore.php?id=".$encToSend."> ";
                $mail->AltBody = $textBodyAltArr[$i];

                $mail->send();
            } catch (Exception $e) {
               echo "<script>alert('Email жіберу мүмкін болмады');</script>";
            }


?>
