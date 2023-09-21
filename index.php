<?php require "connection.php" ; 

$msg = " ";

if(isset($_POST['add'])){
    $stud_id = $_POST['stud_id'] ;
    $assign = $_POST['assign'] ;
    $subject = $_POST['subject'] ;
    
   

    $sql = "SELECT * from assignment where stud_id = :stud_id limit 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':stud_id'=>$stud_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
    if($user){
        $msg =  "THE ID IS EXISTED";
    }
    else{
        $sql1 = "INSERT INTO assignment (STUD_ID,ASSIGNMENT,SUBJECTS,STATUS) values(:STUD_ID,:ASSIGNMENT,:SUBJECTS,'notcompleted')";
        $stmt1=$conn->prepare($sql1);
        $result =  $stmt1->execute([':STUD_ID'=>$stud_id,':ASSIGNMENT'=>$assign,':SUBJECTS'=>$subject]);
        if($result){
            $msg = "Successful Assignment Added";

        }else{
            $msg = "Error coming when Adding task !!!!!####";
        }
        
    }

}


?>

<?php require "header.php"; ?>

<div class="container ">
    <div class="banner">
        <form action="view.php" method="post">
        <div class="mt-5"><h3>SCHOOL ASSIGNMENT</h3></div>
        <p class="mt-3"><?php echo $msg ;?></p>
        <div class="content-contain">
        <div>
        <input type="text"  name="stud_id" class="mt-5 form-control" placeholder="ID" required>
        </div>
        <div>
        <input type="text" name="assign" class=" mt-5 form-control" placeholder="Add assignment" required>
        </div>
        <div>
                <select class=" mt-5 form-control" name="subject" required>
                    <option> Subjects</option>
                    <option>Maths</option>
                    <option>physics</option>
                    <option>chemistry</option>
                    <option>English</option>
                   
                </select>
            </div>
        </div>
        <div>
        <button type="submit" class="mt-5 btn btn-primary" name="add" >ADD</button>
        </div>
        </form>
    </div> 
</div>


<?php require "footer.php"; ?>

