<?php
session_start();{

}
 ?>
<html>
<head>
  <title>Registracijos forma</title>
  <link rel="stylesheet" type="text/css" href="styleSheetForRegistration.css"/>
</head>
<body style ="background-color: #ffe6e6;">

<div class = firstTitle > Registracijos ir prisijungimo forma </div>
<div class = emailTitle > Elektroninis paštas </div>
<div class = paswTitle > Slaptažodis </div>
<div class = backgroundImage></div>

<form action = "main.php" method = "post">
<input type =   "submit"  class = "signGmailPaswwordButton" name = "buttonSignIn" value="Prisijungti">
<input type=    "submit"  class = "submitGmailPasswordButton" name ="buttonRegistration" value="Registruotis" >
<input type =   "text"    name =  "gmail" class="gmailLabel" >
<input type =   "password"name =  "password" class = "passwordLabel" ></form>
<div class ="errorMsg">
  <?php
  include "ClientInformationClass.php";
  include "ActionsWithRegistrationData.php";
  include "EventTableCreation.php";
  include "ClientTableCreation.php";

  new ClientTableCreation(); //sukuriama nauuja kliento informacijos lentele
  new EventTableCreation(); //sukuriama nauuja renginio informacijos lentele


    if(isset($_POST['gmail']) && isset($_POST['password'])){ //gauname informacija is registracijos
    $temporaryGmail = ($_POST['gmail']);
    $temporaryPassword = ($_POST['password']);
    $temporaryHash = hash('sha512', $temporaryPassword);

    $client = new ClientInformationClass($temporaryGmail,$temporaryHash);

      if(isset($_POST['buttonRegistration'])){
        if (!filter_var($temporaryGmail, FILTER_VALIDATE_EMAIL)) { //tikrinamas ar email formatas
            echo "Toks gmail neegzistuoja";
          }
          else{
            $actionInsert = new ActionsWithRegistrationData(); //jei formatas tinkamas duomenys irasomi
            $actionInsert -> insertClientData($client);
          }
    }
    $actionLogin = new ActionsWithRegistrationData();
    $login = $actionLogin->loginCLient($client);

      if($login === true){
        $_SESSION["association"] = $temporaryGmail;
        ?><form action = "main2.php" method = "post">
        <input type="submit" class = "loginButton" name = "buttonSignIn" value="Eiti į puslapį"></form><?php
      if(isset($_POST['buttonSignIn'])){

      }
     }
   }

  ?>

</div>
</body>
</html>
