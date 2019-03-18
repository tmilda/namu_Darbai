<?php

class ActionsWithEventData{
  const serverName = 'localhost';
  const userName = 'root';
  const password = '';
  const dataBaseName = 'registration_form';


  public function __construct(){

  }

  public function findRecurrence(EventInformationClass $eventData){ //iesko pasikartojanciu duomenu DB
  $check = false;
  $direction = mysqli_connect(self::serverName, self::userName, self::password, self::dataBaseName);
  $sqlData = "SELECT eventTitle FROM `event_information`";
  $rezults = $direction->query($sqlData);

       if($rezults->num_rows > 0){
         while($row = $rezults->fetch_assoc()){
              if($eventData->getEventTitle() === $row['eventTitle']){
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

  public function insertEventData(EventInformationClass $eventData,$email){ //iterpti naujus kliento duomenis i DB
  $direction = mysqli_connect(self::serverName, self::userName, self::password, self::dataBaseName);
  $recurrence = $this->findRecurrence($eventData);

    if($recurrence === false){
      $temporary1 = $eventData->getEventTitle();
      $temporary2 = $eventData->getEventDate();
      $sqlData = "INSERT INTO `event_information`(clientGmail,eventTitle,eventDate) VALUES
       ('$email','$temporary1','$temporary2')";

       if(mysqli_query($direction,$sqlData)){

       }
    }
    $direction->close();
  }

  public function showUserEventData($infoByClient){
    $direction = mysqli_connect(self::serverName, self::userName, self::password, self::dataBaseName);

    $sqlData = "SELECT clientGmail,eventTitle,eventDate FROM `event_information` where clientGmail = '$infoByClient'";
    $rezults = $direction->query($sqlData);
    if($rezults->num_rows > 0){
      while($row = $rezults->fetch_assoc()){
             echo $row['eventTitle'] . "<br>";  
       }
    }
    $direction->close();
  }
}
?>
