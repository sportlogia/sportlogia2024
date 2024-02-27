<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
// $path = $_POST('knjige.docx');

// File upload handling
$uploadedFile = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];

// Define the upload directory
$uploadDirectory = 'uploads/';
$targetPath = $uploadDirectory . $fileName;

// Check for file upload errors
if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    echo 'File upload error: ' . $_FILES['file']['error'];
    exit;
}

if (move_uploaded_file($uploadedFile, $targetPath)) {

try {
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'plesk.teleklik.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@sportlogia.com';                     //SMTP username
    $mail->Password   = 'Dm250393.';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('info@sportlogia.com', 'Sportlogia');
 
    $mail->addAddress('strahinja.nikic@ffvs.unibl.org');

    
//    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

// $uploadDirectory = 'uploads/';
// $targetPath = $uploadDirectory . $fileName;

// if (move_uploaded_file($file, $targetPath)) {
//     $mail->addAttachment($targetPath, $fileName);
// } else {
//     echo 'Error moving uploaded file to destination.';
// }

// if (move_uploaded_file($file, $targetPath)) {
//     $mail->addAttachment($targetPath, $fileName);
// } else {
//     echo 'Error moving uploaded file to destination: ' . error_get_last()['message'];
// }


$mail->AddAttachment("uploads/$fileName");
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Paper Submission | ' . $_POST['userName'];
    $mail->Body    = 'A new paper has been submitted. The paper is in the attachment. You can see the paper subject and the applicants contact information below.<br>' 
    . 'Subject of the paper is: "' . $_POST['paperSubject'] . '"<br>' 
    . 'The applicants contact information: <br>'
    . 'Full Name: ' . $_POST['userName'] . '<br>'
    . 'Email: ' . $_POST['userEmail'];;
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

} else {
    echo 'Error moving uploaded file to destination: ' . error_get_last()['message'];
}

?>
