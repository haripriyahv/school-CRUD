<?php require "connection.php";

if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    try{
        $query = "DELETE from assignment where id = :id";
        $stmt = $conn->prepare($query);
        $del = $stmt->execute([':id'=>$id]);
        if($del){
            echo "deleted ";
            header("location:view.php");
            exit(0);
        }else{
            echo "deleted unsuccessfull";
            header("location:view.php");
            exit(0);
        }
    }
    catch(PDOException $e){
        echo $e->getmessage();
    }
}

?>