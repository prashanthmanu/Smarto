<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$id = $_POST['id'];
		$gender = $_POST['gender'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $license = $_POST['license'];
        $registration = $_POST['registration'];
        $insurance = $_POST['insurance'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE details  set name = ?, gender =?, email =?, mobile =?, license_number =?, registration_number =?, insurance_number =? WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$gender,$email,$mobile,$license,$registration,$insurance,$id));
		Database::disconnect();
		header("Location: user data.php");
    }
?>