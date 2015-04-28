<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'phpmailer/PHPMailerAutoload.php';

// if (
//     isset($_POST['requestDate']) 
//     && isset($_POST['requestName']) 
//     && isset($_POST['requestEmail']) 
//     && isset($_POST['requestPhone'])
//     && isset($_POST['companyName'])
//     && isset($_POST['projectName'])

//     && isset($_POST['projectType'])
//     && isset($_POST['projectLocation'])
//     && isset($_POST['projectHighlight'])
//     && isset($_POST['projectExterior'])
//     && isset($_POST['projectInterior'])
//     && isset($_POST['projectPlan'])
//     && isset($_POST['projectAerial'])
//     && isset($_POST['projectAnimation'])
//     && isset($_POST['projectImgNumber'])
//     && isset($_POST['projectPeople'])
//     && isset($_POST['projectImgSize'])

//     && isset($_POST['scheduleStart'])
//     && isset($_POST['scheduleDeadline'])
//     && isset($_POST['schedulePreview1'])
//     && isset($_POST['schedulePreview2'])
//     && isset($_POST['schedulePreview3'])
//     && isset($_POST['scheduleRevisions1'])
//     && isset($_POST['scheduleRevisions2'])
//     && isset($_POST['scheduleRevisions3'])
//     && isset($_POST['scheduleFinal'])
//     )

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
        empty($_POST['projectExterior']) ||
        empty($_POST['projectInterior']) ||
        empty($_POST['projectPlan']) ||
        empty($_POST['projectAerial']) ||
        empty($_POST['projectAnimation']) ||
        empty($_POST['projectImgNumber']) ||
        empty($_POST['projectPeople']) ||
        empty($_POST['projectImgSize']) ||

        empty($_POST['scheduleStart'])

        //not required
        // empty($_POST['scheduleDeadline']) ||
        // empty($_POST['schedulePreview1']) ||
        // empty($_POST['schedulePreview2']) ||
        // empty($_POST['schedulePreview3']) ||
        // empty($_POST['scheduleRevisions1']) ||
        // empty($_POST['scheduleRevisions2']) ||
        // empty($_POST['scheduleRevisions3']) ||
        // empty($_POST['scheduleFinal'])
        
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


        "\r\n\rWHAT - PROJECT DESCRIPTION" .
        "\r\n\rType: " . $_POST['projectType'] .
        "\r\nLocation: " . $_POST['projectLocation'] .
        "\r\nProject Highlight: " . $_POST['projectHighlight'] .

        "\r\n\rDELIVERABLES" .
        "\r\nExterior: " . $_POST['projectExterior'] .
        "\r\nInterior: " . $_POST['projectInterior'] .
        "\r\nPlan: " . $_POST['projectPlan'] .
        "\r\nAerial: " . $_POST['projectAerial'] .
        "\r\nAnimation: " . $_POST['projectAnimation'] .
        "\r\nTotal No. Images: " . $_POST['projectImgNumber'] .
        "\r\nPeople: " . $_POST['projectPeople'] .
        "\r\nImage Size Options: " . $_POST['projectImgSize'] .


        "\r\n\rWHEN - SCHEDULE OF DELIVERY DEADLINES" .
        "\r\n\rStart Date: " . $_POST['scheduleStart'] .
        "\r\nFinal Images Deadline: " . $_POST['scheduleDeadline'] .

        "\r\n\rWORKBACK SCHEDULE" .
        "\r\nPreview 1 Date: " . $_POST['schedulePreview1'] .
        "\r\nPreview 2 Date: " . $_POST['schedulePreview2'] .
        "\r\nPreview 3 Date: " . $_POST['schedulePreview3'] .
        "\r\nFinal Image Revisions (Round 1, V1): " . $_POST['scheduleRevisions1'] .
        "\r\nFinal Image Revisions (Round 2, V2): " . $_POST['scheduleRevisions2'] .
        "\r\nFinal Image Revisions (Round 3, V3): " . $_POST['scheduleRevisions3'] .
        "\r\nFinal Image: " . $_POST['scheduleFinal'] .


        "\r\n\rWHY - PURPOSE OF THE IMAGES" .
        "\r\n\rCity Planning: " . $_POST['purposeCity'] .
        "\r\nConceptual Design: " . $_POST['purposeConceptual'] .
        "\r\nSchematic Design: " . $_POST['purposeSchematic'] .
        "\r\nMarketing: " . $_POST['purposeMarketing'] .
        "\r\nCompetition: " . $_POST['purposeCompetition'] .
        "\r\nP3: " . $_POST['purposeP3'] .
        "\r\nPromotional: " . $_POST['purposePromo'] .
        "\r\nOther: " . $_POST['purposeOther'] .


        "\r\n\rWHO - THE TARGET AUDIENCE AND WHO IS INVOLVED" .

        "\r\n\rMAIN CONTACT" .
        "\r\nName: " . $_POST['whoMainName'] .
        "\r\nEmail: " . $_POST['whoMainEmail'] .
        
        "\r\n\rARCHITECT" .
        "\r\nName: " . $_POST['whoArchitectName'] .
        "\r\nEmail: " . $_POST['whoArchitectEmail'] .
        
        "\r\n\rLANDSCAPE" .
        "\r\nName: " . $_POST['whoLandscapeName'] .
        "\r\nEmail: " . $_POST['whoLandscapeEmail'] .
        
        "\r\n\rINTERIOR" .
        "\r\nName: " . $_POST['whoInteriorName'] .
        "\r\nEmail: " . $_POST['whoInteriorEmail'] .
        
        "\r\n\rBUILDER" .
        "\r\nName: " . $_POST['whoBuilderName'] .
        "\r\nEmail: " . $_POST['whoBuilderEmail'] .
        
        "\r\n\rMARKETING" .
        "\r\nName: " . $_POST['whoMarketingName'] .
        "\r\nEmail: " . $_POST['whoMarketingEmail']
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