<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php

$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Email = $_POST['Email'];
$Mensaje = $_POST['Mensaje'];
$archivo = $_FILES['adjunto'];

if ($Nombre=='' || $Apellidos=='' || $Email=='' || $Mensaje==''){ // si falta un dato en el formulario mandara una alerta al usuario.

echo "<script>alert('Los campos de Nombre - Apellidos - Email - Mensaje son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


     require 'archivosformulario/PHPMailer/PHPMailerAutoload.php';
     $mail = new PHPMailer;
         

// Datos del servidor SMTP


     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
     $mail->Port       = 587;
     $mail->Username = 'dmncatt@gmail.com';                 // SMTP username
     $mail->Password = '1130juanlove'; 
    // Aquí van los datos que apareceran en el correo que reciba
        //adjuntamos un archivo 
            //adjuntamos un archivo

     
    $mail->From     = $Email;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("dmncatt@gmail.com"); // Dirección a la que llegaran los mensajes.
   
// Aquí van los datos que apareceran en el correo que reciba
    //adjuntamos un archivo 
        //adjuntamos un archivo
            
    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto";
    $mail->Body     =  "Nombre: $Nombre \n<br />".    
    "Email: $Email \n<br />".    
    "Mensaje: $Mensaje \n<br />";
    $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
    
    
    


    
    if ($mail->Send())
    echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible. Staff de Cooling & Modding In PCs');location.href ='javascript:history.back()';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>