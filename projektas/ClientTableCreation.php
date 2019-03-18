<?php //sukuria kliento lentele duombazeje "registration_form"
class ClientTableCreation{

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
        $clientDataTable = "CREATE TABLE client_Information(
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          clientGmail varchar(30),
          clientPassword varchar(255)
        )";
         mysqli_query($direction,$clientDataTable);
      }
      $direction -> close();
   }
}
?>
