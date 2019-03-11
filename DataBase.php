<html>
<head>
  <title>Registracijos forma</title>
  <link rel="stylesheet" type="text/css" href="styleSheet.css" />
</head>
<body style ="background-color: #ffe6e6;">
  <div class ="errorMsg">
<?php
class DataBase{

  public function __construct(){

  }

  public function createDataBase(){
    $dir = mysqli_connect("localhost","root","","registration_form");
    if($dir == false){
      die("Connection Error". mysqli_connect_error());
    }
    else{
      $dataTable = "CREATE TABLE data(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        clientGmail varchar(30),
        clientPassword varchar(256)
      )";
      $createData = mysqli_query($dir,$dataTable);
    }
  }
  public function insertData(){
    $dir = mysqli_connect("localhost","root","","registration_form");
    $g = "";
    $p = "";
    $hash = "";
    if(isset($_POST['gmail']) && isset($_POST['password'])){
      $g = ($_POST['gmail']);
      $p = ($_POST['password']);
      $hash = hash('sha512', $p);
    }
    $foo = false;
    $sql = "SELECT clientGmail,clientPassword FROM data";
    $rez = $dir->query($sql);
         if($rez->num_rows > 0){
           while($row = $rez->fetch_assoc()){
                if($g === $row['clientGmail']){
                  $foo = true;
                }
                else{
                    $foo = false;
                }
            }
        }

    if(isset($_POST['buttonRegistration']) && $foo === false){
      $sql = "INSERT INTO `data`(clientGmail,clientPassword) VALUES
       ('$g','$hash')";
       if(mysqli_query($dir,$sql)){

       }
    }
  }
  public function checkData(){
    $dir = mysqli_connect("localhost","root","","registration_form");
    if(isset($_POST['gmail']) && isset($_POST['password'])){
      $g = ($_POST['gmail']);
      $p2 = ($_POST['password']);

    }

    if(isset($_POST['buttonSignIn'])){
      $hash1 = hash('sha512', $p2);
      $sql = "SELECT * FROM data where clientGmail = '$g' and clientPassword = '$hash1'";
      $rez = $dir->query($sql);
           if($rez->num_rows > 0){
              echo "valio";
            }
            else {
              echo "ne valio";
            }
          }
      }
  }
?>
</div>
</body>
</html>
