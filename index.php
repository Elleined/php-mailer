<?
    use PHPMailer\PHPMailer\PHPMailer;
    require "./vendor/phpmailer/phpmailer/src/Exception.php";
    require "./vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require "./vendor/phpmailer/phpmailer/src/SMTP.php";

    const GMAIL_APP_PASS = getenv("GMAIL_APP_PASS");
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
    $mail-> AltBody = 'This is the body in plain text for non-HTML mail clients';
    // $mail->send();
    echo 'Message has been sent';
?>