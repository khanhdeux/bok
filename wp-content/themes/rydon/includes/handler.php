<?php
$owner_email = $_POST["owner_email"];
$headers = 'Form: ' . $_POST["email"];
$subject = 'Form submission: ' . $_POST["name"];
$messageBody = "";

if($_POST['name']!='nope'){
    $messageBody .= '<p>Name: ' . $_POST["name"] . '</p>' . "\n";
    $messageBody .= '<br>' . "\n";
}
if($_POST['email']!='nope'){
    $messageBody .= '<p>Email: ' . $_POST['email'] . '</p>' . "\n";
    $messageBody .= '<br>' . "\n";
}else{
    $headers = '';
}
if($_POST['state']!='nope'){        
    $messageBody .= '<p>State: ' . $_POST['state'] . '</p>' . "\n";
    $messageBody .= '<br>' . "\n";
}
if($_POST['phone']!='nope'){        
    $messageBody .= '<p>Phone: ' . $_POST['phone'] . '</p>' . "\n";
    $messageBody .= '<br>' . "\n";
}   
if($_POST['fax']!='nope'){      
    $messageBody .= '<p>Fax Number: ' . $_POST['fax'] . '</p>' . "\n";
    $messageBody .= '<br>' . "\n";
}
if($_POST['message']!='nope'){
    $messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
}

if($_POST["stripHTML"] == 'true'){
    $messageBody = strip_tags($messageBody);
}

mail($owner_email, $subject, $messageBody, $headers);
?>