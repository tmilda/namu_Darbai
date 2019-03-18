<?php class EventInformationClass{

  private $EventTitle;
  private $EventDate;

  public function __construct($EventTitle, $EventDate){
    $this->EventTitle = $EventTitle;
    $this->EventDate = $EventDate;
  }

  public function getEventTitle(){
    return $this->EventTitle;
  }
  public function getEventDate(){
    return $this->EventDate;
  }
  public function setEventTitle($title){
    $this->EventTitle = $title;
  }
  public function setEventDate($date){
    $this->EventDate = $date;
  }
}
?>
