<?php
require "connection.php" ;

if(isset($_POST['complete_task'])){
    $task = $_POST['complete_task'];

    $sql = "UPDATE assignment SET STATUS = 'complete' where id = :id";
    $stmt = $conn->prepare($sql);
    $user = $stmt->execute([':id'=>$task]);
    

    if($user){
        echo "<script>alert('the data is completed')</script>";
        header("location:view.php");
        exit(0);
    }
}

?>
