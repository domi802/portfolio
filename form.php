<form action="form.php" method="post">
    <label for="name">name</label>
    <input type="text" name="name" id="name" placeholder="enter name">
    <label for="email">email</label>
    <input type="email" name="email" id="email" placeholder="enter email">
    <label for="subject">subject</label>
    <input type="text" name="subject" id="subject" placeholder="enter subject">
    <label for="message">message</label>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="message"></textarea>
    <input type="submit" id="submit_email" name="submit_email" value="submit">
</form>


<?php
    ini_set("SMTP", "192.168.0.105");
    ini_set("smtp_port", "25");

    $email_sent = false;
    if(isset($_POST['submit_email'])){
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            
            $your_email = "domat2000@o2.pl";
            
            $emailBody = "";
            $emailBody .= '<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><b>From: </b>'.$name."<br>";
            $emailBody .= "<b>Mail: </b>".$email."<br>";
            $emailBody .= "<b>Message: </b>".$message."<br></html>";
            
            $emailBodySender = "";
            $emailBodySender .= '<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><b>Your email was succesfully sent!</b><br>';
            $emailBodySender .= "<b>Message: </b>".$message."<br></html>";
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            mail($your_email, $subject, $emailBody);
            mail($email, "Thank you for contacting us!", $emailBodySender, $headers);
            
            $email_sent = true;
        }else{
            $error = true;
        }
    }

?>