<?php

 if (isset($_POST['login-submit'])) {

   require 'dbh.inc.php';

   $mailuid = $_POST['mailuid'];
   $password = $_POST['pwd'];

   if (empty($mailuid) || empty($password)) {
     header("Location: ../site.php?error=emptyfields");
     exit();
   }
   else {
     $sql = "SELECT * FROM Konto WHERE nazwaKonto=? OR emailKonto=?;";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("Location: ../site.php?error=sqlerror");
       exit();
     }
     else {

       mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
       if ($row = mysqli_fetch_assoc($result)) {
        /* $pwdCheck = password_verify($password, $row['pwdKonto']);
         if ($pwdCheck == false) {
           header("Location: ../site.php?error=wrongpassword");
           exit();
         }
         else if($pwdCheck == true) {

           session_start();
           $_SESSION['KontoId'] = $row['id_Konto'];
           $_SESSION['KontoUid'] = $row['uidKonto'];

           header("Location: ../site.php?login=success");
           exit();

         }*/


        if ($password !== $row['hasloKonto']) {
            header("Location: ../site.php?error=wrongpassword");
            exit();
          }
          else if($password == $row['hasloKonto']) {

            session_start();
            $_SESSION['KontoId'] = $row['idKonto'];
            $_SESSION['KontoUid'] = $row['nazwaKonto'];

            header("Location: ../site.php?login=success");
            exit();

          }
         else {

           header("Location: ../site.php?error=badpassword");
           exit();

         }
       }
       else {
         header("Location: ../site.php?error=nouser");
         exit();
       }
     }
   }
 }
 else {
   header("Location: ../site.php");
   exit();
 }
 ?>
