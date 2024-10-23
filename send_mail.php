<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <section>
        <h1>Email Confirmation</h1>
        <fieldset>
            <legend>Contact Information</legend>
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $_REQUEST['first_name']; ?>" disabled><br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $_REQUEST['last_name']; ?>" disabled><br>

            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" value="<?php echo $_REQUEST['email']; ?>" disabled><br>

            <label for="verify">Verify Email:</label>
            <input type="email" name="verify" id="verify" value="<?php echo $_REQUEST['email']; ?>" disabled><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $_REQUEST['phone']; ?>" disabled><br>
        </fieldset>

        <fieldset>
            <legend>Message Information</legend>
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" value="<?php echo $_REQUEST['subject']; ?>" disabled><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" disabled><?php echo $_REQUEST['message']; ?></textarea>
        </fieldset>

        <h2>
        <?php
        if (isset($_REQUEST['email'])) {
            $admin_email = "sariashammout@apollodistributionlab.com"; // Replace with your email
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];
            $subject = $_REQUEST['subject'];
            $message = $_REQUEST['message'];
            $name = $_REQUEST['first_name'] . " " . $_REQUEST['last_name'];

            $body  = "From: " . $name . "\n";
            $body .= "Email: " . $email . "\n";
            $body .= "Phone: " . $phone . "\n";
            $body .= "Message: " . $message;

            $headers = "From: " . $name . " <" . $email . ">\r\n";
            $headers .= "CC: " . $name . " <" . $email . ">";

            mail($admin_email, $subject, $body, $headers);

            echo "Thank you for contacting us!";
        } else {
            echo "There has been an error!";
        }
        ?>
        </h2>
    </section>
</body>
</html>

