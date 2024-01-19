<?
    require_once "./vendor/autoload.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>PHP Mailer</title>
</head>
<body>
    <form action="./src/SendEmail.php" method="post" enctype="multipart/form-data">
        <label for="receiver">Receiver: </label>
        <input type="email" name="receiver" id="receiver"/><br>

        <label for="subject">Subject: </label>
        <input type="text" name="subject" id="subject"/><br>

        <label for="body">Body: </label>
        <input type="text" name="body" id="body"/> <br>

        <label for="attachment">Attachment: </label>
        <input type="file" name="attachment" id="attachment"/><br>

        <input type="submit" name="Send mail"/>
    </form>
</body>
</html>