<!DOCTYPE html>
<html>

<?php
include 'header.php';
include 'sidebar.php';
include 'includes/session.php';

$con = mysqli_connect("localhost", "admin", null, "pganim");
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Products
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Products</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#" class="btn btn-primary btn-sm btn-flat" id="addproduct" ><i class="fa fa-plus"></i> New</a>
                <div class="box-body">
                  <table class="table table-bordered">
                    <thead>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Collection</th>
                      <th>Price</th>
                      <th>Stock Status</th>
                      <th>Tools</th>
                    </thead>
                    <tbody>
                      <?php

                      $query = "SELECT * FROM products";
                      $result = mysqli_query($con, $query);

                      

                      if (mysqli_num_rows($result) == 0) {
                        echo "<p>No products found.</p>";
                      } else {
                        while ($row = mysqli_fetch_array($result)) {
                          $collectionName2ID = $row['collection_id'];
                          $query2 = "SELECT collection_name FROM collections WHERE collection_id = $collectionName2ID";
                          $result2 = mysqli_query($con, $query2);
                          foreach ($result2 as $collection) {
                            $image = (!empty($row['img'])) ? '../images/' . $row['img'] : '../images/noimage.jpg';
                            echo "
                            <tr>
                            <td style='width:150px'>" . $row['product_name'] . "</td>
                            <td style='width:120px'>
                              <img src='" . $image . "' height='40px' width='40px'>
                            </td>
                            <td>" . $row['description'] . "</td>
                            <td style='width:100px'>" . $row['category'] . "</td>
                            <td style='width:120px'>" . $collection['collection_name'] . "</td>
                            <td style='width:120px'>RM " . number_format($row['price'], 2) . "</td>
                            <td style='width:120px'>" . $row['stock_status'] . "</td>
                            <td style='width:150px'>
                            <a href ='products_edit.php?id=".$row['product_id']."'><button class='btn btn-success btn-sm editProdBtn btn-flat' data-id='" . $row['product_id'] . "'><i class='fa fa-edit'></i> Edit</button></a>
                              <button onclick='deleteProd(".$row['product_id'].")' class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['product_id'] . "'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                           </tr>
                            ";
                          }
                        }
                      }

                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>



      </section>
    </div>
  </div>

<?php
include 'includes/product_modal.php';
?>

<script>

document.getElementById('addproduct').addEventListener('click',
function(){
  document.querySelector('.bg-modal-add').style.display = 'flex';

});

document.querySelector('.close-add').addEventListener('click',
function(){
  document.querySelector('.bg-modal-add').style.display = 'none';
});

function deleteProd(productID){
  var result = confirm("Are you sure you would like to DELETE this product?");
  if(result){
    window.location = "products_delete.php?id="+productID;
  }
}



</script>





</body>

</html>