<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'phpmailer/PHPMailerAutoload.php';

if (
    isset($_POST['requestDate']) 
    && isset($_POST['requestName']) 
    && isset($_POST['requestEmail']) 
    && isset($_POST['requestPhone']) 
    && isset($_POST['projectType'])
    ) {

    //check if any of the inputs are empty
    // if (empty($_POST['requestDate']) || empty($_POST['requestName']) || empty($_POST['requestEmail']) || empty($_POST['requestPhone'])) {
    //     $data = array('success' => false, 'message' => 'Please fill out the form completely.');
    //     echo json_encode($data);
    //     exit;
    // }

    //create an instance of PHPMailer
    $mail = new PHPMailer();

    $mail->From = $_POST['requestEmail'];
    $mail->FromName = $_POST['requestName'];
    $mail->AddAddress('tyler@tamedia.ca'); //recipient 
    $mail->Subject = "Quote request from " . $_POST['requestName'];
    $mail->Body = 
        "Date: " . $_POST['requestDate'] .
        "\r\nName: " . $_POST['requestName'] .
        "\r\nEmail: " . $_POST['requestEmail'] .
        "\r\nPhone: " . $_POST['requestPhone'] .
        "\r\n\rType: " . $_POST['projectType'] 
    ;

    if (isset($_POST['ref'])) {
        $mail->Body .= "\r\n\r\nRef: " . $_POST['ref'];
    }

    if(!$mail->send()) {
        $data = array('success' => false, 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        echo json_encode($data);
        exit;
    }

    $data = array('success' => true, 'message' => 'Thanks! We have received your message.');
    echo json_encode($data);

} else {

    $data = array('success' => false, 'message' => 'Please fill out the form completely.');
    echo json_encode($data);

}