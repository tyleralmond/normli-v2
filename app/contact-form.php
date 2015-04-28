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
        "\nName: " . $_POST['requestName'] .
        "\nEmail: " . $_POST['requestEmail'] .
        "\nPhone: " . $_POST['requestPhone'] .
        "\nCompany Name: " . $_POST['companyName'] .
        "\nProject Name: " . $_POST['projectName'] .


        "\n\n\nWHAT - PROJECT DESCRIPTION" .
        "\n\nType: " . $_POST['projectType'] .
        "\nLocation: " . $_POST['projectLocation'] .
        "\nProject Highlight: " . $_POST['projectHighlight'] .

        "\n\nDELIVERABLES" .
        "\n\nExterior: " . $_POST['projectExterior'] .
        "\nInterior: " . $_POST['projectInterior'] .
        "\nPlan: " . $_POST['projectPlan'] .
        "\nAerial: " . $_POST['projectAerial'] .
        "\nAnimation: " . $_POST['projectAnimation'] .
        "\nTotal No. Images: " . $_POST['projectImgNumber'] .
        "\n\nPeople: " . $_POST['projectPeople'] .
        "\nImage Size Options: " . $_POST['projectImgSize'] .


        "\n\n\nWHEN - SCHEDULE OF DELIVERY DEADLINES" .
        "\n\nStart Date: " . $_POST['scheduleStart'] .
        "\nFinal Images Deadline: " . $_POST['scheduleDeadline'] .

        "\n\nWORKBACK SCHEDULE" .
        "\n\nPreview 1 Date: " . $_POST['schedulePreview1'] .
        "\nPreview 2 Date: " . $_POST['schedulePreview2'] .
        "\nPreview 3 Date: " . $_POST['schedulePreview3'] .
        "\nFinal Image Revisions (Round 1, V1): " . $_POST['scheduleRevisions1'] .
        "\nFinal Image Revisions (Round 2, V2): " . $_POST['scheduleRevisions2'] .
        "\nFinal Image Revisions (Round 3, V3): " . $_POST['scheduleRevisions3'] .
        "\nFinal Image: " . $_POST['scheduleFinal'] .


        "\n\n\nWHY - PURPOSE OF THE IMAGES" .
        "\n\nCity Planning: " . $_POST['purposeCity'] .
        "\nConceptual Design: " . $_POST['purposeConceptual'] .
        "\nSchematic Design: " . $_POST['purposeSchematic'] .
        "\nMarketing: " . $_POST['purposeMarketing'] .
        "\nCompetition: " . $_POST['purposeCompetition'] .
        "\nP3: " . $_POST['purposeP3'] .
        "\nPromotional: " . $_POST['purposePromo'] .
        "\nOther: " . $_POST['purposeOther'] .


        "\n\n\nWHO - THE TARGET AUDIENCE AND WHO IS INVOLVED" .
        "\n\nDescribe the Target Audience: " . $_POST['whoTarget'] .

        "\n\nMAIN CONTACT" .
        "\nName: " . $_POST['whoMainName'] .
        "\nEmail: " . $_POST['whoMainEmail'] .
        
        "\n\nARCHITECT" .
        "\nName: " . $_POST['whoArchitectName'] .
        "\nEmail: " . $_POST['whoArchitectEmail'] .
        
        "\n\nLANDSCAPE" .
        "\nName: " . $_POST['whoLandscapeName'] .
        "\nEmail: " . $_POST['whoLandscapeEmail'] .
        
        "\n\nINTERIOR" .
        "\nName: " . $_POST['whoInteriorName'] .
        "\nEmail: " . $_POST['whoInteriorEmail'] .
        
        "\n\nBUILDER" .
        "\nName: " . $_POST['whoBuilderName'] .
        "\nEmail: " . $_POST['whoBuilderEmail'] .
        
        "\n\nMARKETING AGENCY" .
        "\nName: " . $_POST['whoMarketingName'] .
        "\nEmail: " . $_POST['whoMarketingEmail']
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