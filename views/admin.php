<?php

session_start();



if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'){


include 'adminHeader.php';


if(isset($_GET['page'])){

  $page = $_GET['page'];

  switch($page){

    case "userS":
      include "../admin/userStatistics.php";
      break;
    case "galUD":
      include "../admin/galeryCombo.php";
      break;
    case "galI":
      include "../admin/galeryInsert.php";
      break;
    case "typeUD":
      include "../admin/typesCombo.php";
      break;
    case "typeI":
      include "../admin/typesInsert.php";
      break;
    case "newUD":
      include "../admin/newsCombo.php";
      break;
    case "newI":
      include "../admin/newsInsert.php";
      break;
    case "shopUD":
      include "../admin/shopCombo.php";
      break;
    case "shopI":
      include "../admin/shopInsert.php";
      break;
    case "sliderUD":
      include "../admin/sliderCombo.php";
      break;
    case "sliderI":
      include "../admin/sliderInser.php";
      break;
      
    
    default:
      include "../admin/userStatistics.php";
      break;
    
  }


}





include 'adminFooter.php';






}
else{

  header("Location: ../index.php");
}







