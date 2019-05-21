<?php
//Fetching Values from URL
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$contact = $_POST['contact1'];
//sanitizing email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
//After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
$subject = 'Juan Ordeix - Mentalista';
// To send HTML mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charmset=iso-8859-1' . "\r\n";
$headers .= 'From:' . $email. "\r\n"; // Sender's Email
$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
$template = '<div style="padding:50px; color:white;">Hola ' . $name . ',<br/>'
. '<br/>Gracias por contactarte!<br/>'
. 'Me pondré en contacto tan pronto como sea posible.<br/><br/>'
. 'Nombre: ' . $name . '<br/>'
. 'Email: ' . $email . '<br/>'
. 'Teléfono: ' . $contact . '<br/>'
. 'Mensaje: ' . $message . '<br/><br/>'
. 'Este es un mail de confirmación.</div>';
$sendmessage = "<div style=\"background-color:#7E7E7E; color:white;\">" . $template . "</div>";
// message lines should not exceed 70 characters (PHP rule), so wrap it
$sendmessage = wordwrap($sendmessage, 70);

// Send mail by PHP Mail Function
mail("juanordeix@gmail.com", $subject, $sendmessage, $headers);
echo "Tu mensaje ha sido enviado correctamente.";

} else {
echo "<span>* El email ingresado no es valido</span>";
}

?>