<?php 
   require_once 'includes/header.php';
   require_once('./config/variables.php');
 ?>  

   <?php require_once("users/UserInterface.php"); 
    $action = isset($_GET['action']) ? $_GET['action'] : '';
   //  echo $action;

    $userinterface = new UserInterface();

    switch ($action) {
       case 'register':
         if(isset($_SESSION['email'])){
            header("Location: " . $host . "/index.php?action=profile");
            break;
         }
         echo  $userinterface->register();
          break;
       case 'login':
         if(isset($_SESSION['email'])){
            header("Location: " . $host . "/index.php?action=profile");
            break;
         }
         echo $userinterface->login();
          break;
       case 'profile':
         if(!isset($_SESSION['email'])){
            header("Location: " . $host . "/index.php?action=login");
            break;
         }
         echo $userinterface->profile();
          break;
       
       default:   
        if(isset($_SESSION['email'])){
         header("Location: " . $host . "/index.php?action=profile");
         break;
        }  
         echo $userinterface->login();
         break;
    }
    
   ?>


<?php require_once 'includes/footer.php'; ?>