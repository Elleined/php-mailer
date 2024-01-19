<?
    require_once "../vendor/phpmailer/phpmailer/src/PHPMailer.php";  
    require_once "../vendor/phpmailer/phpmailer/src/Exception.php";
    require_once "../vendor/phpmailer/phpmailer/src/SMTP.php";
    require_once "./ValueValidator.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
 

    $GMAIL_APP_PASS = getenv("GMAIL_APP_PASS");
    if(isNotValid($GMAIL_APP_PASS)) {
        echo "Reading gmail app password in your machine environment variable failed! Please set it correctly with name of GMAIL_APP_PASS and value as your generated app password";
        return;
    }

    const YOUR_EMAIL = "demadegu@gmail.com";
    if (isNotValid(YOUR_EMAIL)) {
        echo "Set first your email!";
        return;
    }

    // Server settings
    $mail = new PHPMailer(true);
    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth = true;                       
    $mail -> Username = YOUR_EMAIL;
    $mail -> Password = $GMAIL_APP_PASS;
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587;

    // Sender
    $mail -> setFrom(YOUR_EMAIL, "Denielle Mar M. De Guzman");

    // Receiver
    $receiver = $_POST["receiver"];
    if (isNotValid(($receiver))) {
        echo "Please specify receiver email!";
        return;
    }
    
    $mail -> addAddress($receiver);
    $mail -> addReplyTo(YOUR_EMAIL);

    // Attachments
    $attachment = $_FILES["attachment"];
    if(isAttachmentValid($attachment)) {
        $filePath = $attachment["tmp_name"];
        $fileName = $attachment["name"];
        $mail -> addAttachment($filePath, $fileName); 
    }
    
    // Content
    $subject = $_POST["subject"];
    if(isNotValid($subject)) {
        echo "Please specify subject of your email!";
        return;
    }
    $mail -> Subject = $subject;

    $body = $_POST["body"];
    if(isNotValid($body)) {
        echo "Please specify body of your email!";
        return;
    }
    $mail -> Body = $body;

    $mail -> send();
    echo "Email sent successfully to $receiver";
?>
