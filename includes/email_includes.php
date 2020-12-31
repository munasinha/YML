<?php

  require '../commons/PHPMailer/PHPMailerAutoload.php';
          $mail = new PHPMailer;
          $mail->isSMTP();   
          $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                            // Enable SMTP authentication
          $mail->Username = 'siriwardhanamahela6@gmail.com';          // SMTP username
          $mail->Password = "while{};'154"; // SMTP password
          $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;   

