<html>
<head>
  <title>Registracijos forma</title>
  <link rel="stylesheet" type="text/css" href="styleSheet.css" />
</head>
<body style ="background-color: #ffe6e6;">

<div class = firstTitle > Registracijos forma </div>
<div class = emailTitle > Elektroninis paštas </div>
<div class = paswTitle > Slaptažodis </div>
<div class = backgroundImage></div>
<form action = "namuDarbas.php" method = "post">
<input type="submit" class ="submitGmailPasswordButton" name ="buttonRegistration" value="Registruotis" >
<input type = "text"  name = "gmail" class="gmailLabel" >
<input type = "password"  name = "password" class = "passwordLabel" >
<input type = "submit"  class = "signGmailPaswwordButton" name = "buttonSignIn" value="Prisijungti"!></form>
<div class ="errorMsg">
<?php
include "ClientInfo.php";
include "DataBase.php";
//PRISIJUNGIMAS I DUOMBAZE------------------------------------------------------------------
$db = new DataBase();
$db->createDataBase();
$db->insertData();
$db->checkData();
?>

</div>
</body>
</html>
