<?php
$message_sent = false;
if (isset($_POST['email'])  && $_POST['email'] != '') {

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        // submit the form
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $messageSubject = $_POST['subject'];
        $message = $_POST['message'];

        $to = "caremobyl@gmail.com";
        $body = "";

        $body .= "From: " . $userName . "\r\n";
        $body .= "Email: " . $userEmail . "\r\n";
        $body .= "Message: " . $message . "\r\n";

        mail($to, $messageSubject, $body);

        $message_sent = true;
    } else {
        $invalid_class_name = "form-invalid";
    }
}



?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.js"></script>
</head>

<body>
    <?php
    if ($message_sent) :
    ?>
        <h3>Thanks, we'll be in touch</h3>

    <?php
    else :
        '<h3>Error Message failed to sent</h3>'
    ?>


        <div class="container">
            <form action="/index.php" method="POST" class="form">
                <div class="form-group">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" tabindex="1" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control <?= $invalid_class_name ?? "" ?>" id="email" name="email" placeholder="info@mobylcare.com" tabindex="2" required>
                </div>
                <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Your Subject" tabindex="3" required>
                </div>
                <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn">Send Message!</button>
                </div>
            </form>
        </div>

    <?php
    endif
    ?>
</body>

</html>