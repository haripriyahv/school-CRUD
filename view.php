<?php require "connection.php"; 

// if(isset($_POST['']))


$sql = "SELECT * from assignment";
$stmt= $conn->prepare($sql);
$stmt->execute();
$student = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require "header.php"; ?>

<div class="container">
<div class="">
  <div><h3>STUDENT DETAILS</h3></div>
  <table class="table table-striped">
  <thead>
    <tr>
      <th> ID</th>
      <th>ASSIGNMENT</th>
      <th colspan=4>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($student as $stud): ?>
    <tr>
        <td><?php  echo $stud['STUD_ID']; ?></td>
        <td id="assign"><?php echo $stud['ASSIGNMENT']; ?></td>
        <form action="complete.php" method="post">
         <td> 
         <input type="hidden" name="complete_task" value="<?php echo $stud['id']; ?>">
          <button class="btn btn-success"><?php echo ($stud['STATUS'] == 'complete')? 'Complete' : 'Incomplete'; ?></button>
        </td>
        </form>
        <form action="delete.php" method="post">
         <td><button type="submit"  class="btn btn-danger text-dark" onclick="return confirm('are u sure want to delete this assignment!!?')" value="<?php echo $stud['id'];?>" name="delete" >DELETE</button></td>
        </form>
    </tr> 
    <?php endforeach ?>
  </tbody>
</table>
<div><a href="index.php" class="btn btn-primary text-dark" type="button">BACK</a></div>

</div>
</div>



<?php require "footer.php"; ?>