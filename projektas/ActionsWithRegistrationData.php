<?php
class ActionsWithRegistrationData{

  const serverName = 'localhost';
  const userName = 'root';
  const password = '';
  const dataBaseName = 'registration_form';

  public function __construct(){

  }

  public function findRecurrence(ClientInformationClass $clientData){ //iesko pasikartojanciu duomenu DB
  $check = false;
  $direction = mysqli_connect(self::serverName, self::userName, self::password, self::dataBaseName);
  $sqlData = "SELECT clientGmail, clientPassword FROM `client_Information`";
  $rezults = $direction->query($sqlData);

       if($rezults->num_rows > 0){
         while($row = $rezults->fetch_assoc()){
              if($clientData->getClientEmail() === $row['clientGmail']){
                $check = true;
                 break;
              }
              else{
                  $check = false;
              }
          }
       }
       $direction->close();
       return $check;
  }
  public function insertClientData(ClientInformationClass $clientData){ //iterpti naujus kliento duomenis i DB
  $direction = mysqli_connect(self::serverName, self::userName, self::password, self::dataBaseName);
  $recurrence = $this->findRecurrence($clientData);

    if($recurrence === false){
      $temporary1 = $clientData->getClientEmail();
      $temporary2 = $clientData->getClientPassword();
      $sqlData = "INSERT INTO `client_Information`(clientGmail,clientPassword) VALUES
       ('$temporary1','$temporary2')";

       if(mysqli_query($direction,$sqlData)){

       }
    }
    $direction->close();
  }

 public function loginCLient(ClientInformationClass $clientData){
    $direction = mysqli_connect(self::serverName, self::userName, self::password, self::dataBaseName);
    $temporary = $clientData->getClientEmail();
    $temporary2 = $clientData->getClientPassword();
    $sqlData = "SELECT * FROM client_information where clientGmail = '$temporary' and clientPassword = '$temporary2'";

      $rez = $direction->query($sqlData);
      if($rez->num_rows > 0){
        return true;
      }
      else if($rez->num_rows == 0) {
      return false;
      }
      else{
        echo "Bandykite dar karta";
      }

      $direction -> close();
}
}
