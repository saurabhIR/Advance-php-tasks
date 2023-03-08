<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <form method="post">
        Email <input type="email" name="email" value=""><br>
        <button type="submit" name="send">Send</button><br>
        <?php include 'send.php';?>
    </form>
    
</body>
</html>