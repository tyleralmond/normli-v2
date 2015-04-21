<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'phpmailer/PHPMailerAutoload.php';

if (
    isset($_POST['requestDate']) 
    && isset($_POST['requestName']) 
    && isset($_POST['requestEmail']) 
    && isset($_POST['requestPhone'])
    && isset($_POST['companyName'])
    && isset($_POST['projectName'])

    && isset($_POST['projectType'])
    && isset($_POST['projectLocation'])
    && isset($_POST['projectHighlight'])
    && isset($_POST['projectPeople'])
    && isset($_POST['projectImgSize'])

    && isset($_POST['projectExterior'])
    && isset($_POST['projectInterior'])
    && isset($_POST['projectPlan'])
    && isset($_POST['projectAerial'])
    && isset($_POST['projectAnimation'])
    && isset($_POST['projectImgNumber'])
    ) {

    //check if any of the inputs are empty
    if (
        empty($_POST['requestDate']) || 
        empty($_POST['requestName']) || 
        empty($_POST['requestEmail']) || 
        empty($_POST['requestPhone']) ||
        empty($_POST['companyName']) ||
        empty($_POST['projectName']) ||

        empty($_POST['projectType']) ||
        empty($_POST['projectLocation']) ||
        empty($_POST['projectHighlight']) ||
        empty($_POST['projectPeople']) ||
        empty($_POST['projectImgSize']) ||

        empty($_POST['projectExterior']) ||
        empty($_POST['projectInterior']) ||
        empty($_POST['projectPlan']) ||
        empty($_POST['projectAerial']) ||
        empty($_POST['projectAnimation']) ||
        empty($_POST['projectImgNumber'])
        ) {
        $data = array('success' => false, 'message' => 'Please fill out all of the required fields.');
        echo json_encode($data);
        exit;
    }

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
        "\r\nCompany Name: " . $_POST['companyName'] .
        "\r\nProject Name: " . $_POST['projectName'] .

        "\r\n\rPROJECT DESCRIPTION" .
        "\r\nType: " . $_POST['projectType'] .
        "\r\nLocation: " . $_POST['projectLocation'] .
        "\r\nProject Highlight: " . $_POST['projectHighlight'] .
        "\r\nPeople: " . $_POST['projectPeople'] .
        "\r\nImage Size Options: " . $_POST['projectImgSize'] .

        "\r\n\rDELIVERABLES" .
        "\r\nExterior: " . $_POST['projectExterior'] .
        "\r\nInterior: " . $_POST['projectInterior'] .
        "\r\nPlan: " . $_POST['projectPlan'] .
        "\r\nAerial: " . $_POST['projectAerial'] .
        "\r\nAnimation: " . $_POST['projectAnimation'] .
        "\r\nTotal No. Images: " . $_POST['projectImgNumber']
    ;

    if (isset($_POST['ref'])) {
        $mail->Body .= "\r\n\r\nRef: " . $_POST['ref'];
    }

    if(!$mail->send()) {
        $data = array('success' => false, 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        echo json_encode($data);
        exit;
    }

    $data = array('success' => true, 'message' => 'Thank you for your consideration. We have received your form and will respond with a fee proposal for your review within 24 hours.');
    echo json_encode($data);

} else {

    $data = array('success' => false, 'message' => 'Please fill out all of the required fields.');
    echo json_encode($data);

}