<?php //sukuria renginio lentele duombazeje "registration_form"
class EventTableCreation{

  const serverName = 'localhost';
  const userName = 'root';
  const password = '';
  const dataBaseName = 'registration_form';

  public function __construct(){
      $direction = mysqli_connect(self::serverName, self::userName, self::password, self::dataBaseName);
      if($direction == false){
        die("Connection Error". mysqli_connect_error());
      }
      else{
        $eventDataTable = "CREATE TABLE event_Information(
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          clientGmail varchar(30),
          eventTitle varchar(25),
          eventDate Date
        )";
         mysqli_query($direction,$eventDataTable);
      }
      $direction -> close();
  }
}
?>
