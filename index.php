<?
    use PHPMailer\PHPMailer\PHPMailer;
    require "./vendor/phpmailer/phpmailer/src/Exception.php";
    require "./vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require "./vendor/phpmailer/phpmailer/src/SMTP.php";

    const GMAIL_APP_PASS =  "asd";
    //getenv("GMAIL_APP_PASS");
    const YOUR_EMAIL = "demadegu@gmail.com";

    // Server settings
    $mail = new PHPMailer(true);
    $mail-> isSMTP();
    $mail-> Host       = 'smtp.gmail.com';
    $mail-> SMTPAuth   = true;                       
    $mail-> Username   = YOUR_EMAIL;
    $mail-> Password   = GMAIL_APP_PASS;
    $mail-> SMTPSecure = 'tls';
    $mail-> Port       = 587;

    // Sender
    $mail-> setFrom(YOUR_EMAIL);

    // Receiver
    $mail-> addAddress('demadegu@gmail.com');
    $mail-> addReplyTo(YOUR_EMAIL);

    // Attachments
    // $mail-> addAttachment("C:\Users\Elleined\Downloads\deGuzmanDenielleMarM.docx"); 

    // Content
    $mail-> Subject = 'Here is the subject';
    $mail-> Body = 'This is the HTML message body <b> in bold!</b> ';
    // $mail->send();
    echo 'Message has been sent';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mailer</title>
</head>
<body>
    <label for="email">Email: </label>
    <input type="email" name="receiver" id="email"/><br>

    <label for="subject">Subject: </label>
    <input type="text" name="subject" id="subject"/><br>

    <label for="body">Body: </label>
    <input type="text" name="body" id="body"/> <br>

    <label for="attachment">Attachment: </label>
    <input type="file" name="attachment" id="attachment"/><br>

    <input type="submit" name="Send mail" />
</body>
</html>