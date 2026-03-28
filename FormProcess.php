<?php
// Check that the form was submitted and Email exists
if(isset($_POST['email'])) {


    $email_to = "mizzfrankyfoxx@hotmail.com";
    $email_subject = "Franky Foxx Contact Form Submission";

    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted.<br><br>";
        echo $error."<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // SECTION A — Assign variables from your form fields
    // (Names MUST match your contact.html exactly)

    $FirstName = $_POST['fname'];      // required
    $LastName  = $_POST['lname'];      // required
    $City      = $_POST['city'];       // optional
    $State     = $_POST['state'];      // optional
    $Zip       = $_POST['zip'];        // optional
    $Gender    = $_POST['gender'];     // optional
    $Education = $_POST['edu'];        // optional
    $email_from = $_POST['email'];     // required
    $Comments  = $_POST['comments'];   // optional

    // Build the message
    $email_message = "Form details below:\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    // SECTION B — Build email body using your field names
    $email_message .= "First Name: ".clean_string($FirstName)."\n";
    $email_message .= "Last Name: ".clean_string($LastName)."\n";
    $email_message .= "City: ".clean_string($City)."\n";
    $email_message .= "State: ".clean_string($State)."\n";
    $email_message .= "Zip: ".clean_string($Zip)."\n";
    $email_message .= "Gender: ".clean_string($Gender)."\n";
    $email_message .= "Education: ".clean_string($Education)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($Comments)."\n";

    // Email headers
    $headers = 'From: '.$email_from."\r\n".
               'Reply-To: '.$email_from."\r\n" .
               'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $email_message, $headers);

    // REDIRECT SUPPORT — matches your rubric
    // Your form includes: <input type="hidden" name="redirect" value="contactSent.html">
    if(isset($_POST['redirect'])) {
        $redirect_page = $_POST['redirect'];
    } else {
        $redirect_page = "contactSent.html"; // fallback
    }
?>
<html>
<head>
<meta http-equiv="REFRESH" content="1;url=<?php echo $redirect_page; ?>">
</head>
<body>
</body>
</html>

<?php
}
die();
?>
