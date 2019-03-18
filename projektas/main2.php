<?php
session_start();{}
 ?>
<html>
<head>
  <title>Renginiai</title>
  <link rel= "stylesheet" type="text/css" href="styleSheetEvents.css"/>
</head>
<body style ="background-color: #ffe6e6;">
  <div class = currentEventsTitle > Esami renginiai: </div>
  <div class = addingEventTitle > Pridėti renginį: </div>
  <div class = addEvent> Renginio pavadinimas: </div>
  <div class = addDate> Renginio data: </div>
  <div class = backgroundImage></div>
  <form action = "main2.php" method = "post">
  <input type="submit" class ="submitEventButton" name ="addButtonEvent" value="Pridėti" >
  <input type="submit" class ="a" name = "eventButton" value="Rodyti" >
  <input type = "text"  name = "eventTitle" class="eventTitleLabel">
  <input type = "date"  name = "eventDate" class = "eventDateLabel"></form>
<?php

include "ActionsWithEventData.php";
include "EventInformationClass.php";
include "EventTableCreation.php";
include "ClientTableCreation.php";
$t = $_SESSION['association'];
$displayEvent = new ActionsWithEventData();

if(isset($_POST['eventTitle']) && isset($_POST['eventDate'])){
  $temporaryTitle = ($_POST['eventTitle']);
  $temporaryDate = ($_POST['eventDate']);
  $event = new EventInformationClass($temporaryTitle,$temporaryDate);

  if(isset($_POST['addButtonEvent'])){
    $event->getEventTitle();
    $a = new ActionsWithEventData();
    $a -> insertEventData($event,$t);
  }
}
if(isset($_POST['eventButton'])){
  ?> <div class = "light"> <?php $displayEvent -> showUserEventData($t);
}

?>
</div>
</body>
</html>
