<?

require 'PHPMailer/PHPMailerAutoload.php';

function sendMail($address, $subject, $body, $alternateBody = '', $isHtml = true)
{
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.swlands.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@swlands.ru';                 // SMTP username
    $mail->Password = '5XvMjQK7y';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 250;                                    // TCP port to connect to

    $mail->setFrom('support@swlands.ru', 'Shamaal World Lands Support');
    $mail->addAddress($address);               // Name is optional
    $mail->isHTML($isHtml);

    $mail->Subject = $subject;
    $mail->Body = $body;
    if ($alternateBody) {
        $mail->AltBody = $alternateBody;
    }

    return $mail->send();
}

?>
