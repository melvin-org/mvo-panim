<form method="POST" action="form2.php" enctype="multipart/form-data">

<?php

$con = mysqli_connect("localhost", "admin", null, "pganim");
$query = "SELECT * FROM collections";
$result = mysqli_query($con, $query);

?>

<input type="text" id="pname" name="pname" placeholder="name" required>
<input type="text" id="pcat" name="pcat" placeholder="cat" required>

<label for="pcollection">Collection:</label>
  <select name="pcollection" id="pcollection">
    <?php
    foreach($result as $collection){
        echo "<option value='".$collection['collection_id']."'>".$collection['collection_name']."</option>";
    }
    ?>
  </select>

<input type="file" id="photo" name="photo" required>
<input type="text" id="pprice" name="pprice" placeholder="price" required>
<input type="text" id="pdesc" name="pdesc" placeholder="desc" required>
<input type="text" id="pstatus" name="pstatus" placeholder="status" required>

<button type="submit" name="add">Save</button>

<?php
mysqli_close($con);

?>

</form>