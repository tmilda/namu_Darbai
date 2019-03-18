<?php
class ClientInformationClass{

  private $ClientEmail;
  private $ClientPassword;

  public function __construct($ClientEmail, $ClientPassword){
    $this->ClientEmail = $ClientEmail;
    $this->ClientPassword = $ClientPassword;
  }

  public function getClientEmail(){
    return $this->ClientEmail;
  }
  public function getClientPassword(){
    return $this->ClientPassword;
  }
  public function setClientEmail($email){
    $this->ClientEmail = $email;
  }
  public function setClientPassword($password){
    $this->ClientPassword = $password;
  }
}
?>
