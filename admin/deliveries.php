<!DOCTYPE html>
<html>

<?php
include 'includes/session.php';
include 'header.php';
include 'sidebar.php';

error_reporting(0);

$con = mysqli_connect("localhost", "admin", null, "pganim");
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Deliveries
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Deliveries</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#" class="btn btn-primary btn-sm btn-flat" id="adddelivery" ><i class="fa fa-plus"></i> New</a>
                <div class="box-body">
                  <table class="table table-bordered">
                    <thead>
                      <th>Delivery ID</th>
                      <th>Order ID</th>
                      <th>Courier Used</th>
                      <th>Delivery Fee</th>
                      <th>Tracking No</th>
                      <th>Tools</th>
                    </thead>
                    <tbody>
                      <?php

                      $query = "SELECT * FROM delivery";
                      $result = mysqli_query($con, $query);

                      

                      if (mysqli_num_rows($result) == 0) {
                        echo "<p>No Deliveries Found.</p>";
                      } else {
                        while ($row = mysqli_fetch_array($result)) {

                            echo "
                            <tr>
                            <td style='width:150px'>" . $row['delivery_id'] . "</td>
                            <td style='width:150px'>" . $row['order_id'] . "</td>
                            <td style='width:150px'>" . $row['courier_used'] . "</td>
                            <td style='width:120px'>RM " . number_format($row['delivery_fee'], 2) . "</td>
                            <td style='width:120px'>" . $row['tracking_no'] . "</td>
                            <td style='width:150px'>
                            <a href ='deliveries_edit.php?id=".$row['delivery_id']."'><button class='btn btn-success btn-sm editDeliBtn btn-flat' data-id='" . $row['delivery_id'] . "'><i class='fa fa-edit'></i> Edit</button></a>
                              <button onclick='deleteDeli(".$row['delivery_id'].")' class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['delivery_id'] . "'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                           </tr>
                            ";
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
include 'includes/delivery_modal.php';
?>

<script>

document.getElementById('adddelivery').addEventListener('click',
function(){
  document.querySelector('.bg-modal-addDelivery').style.display = 'flex';

});

function deleteDeli(deliveryID){
  var result = confirm("Are you sure you would like to DELETE this delivery?");
  if(result){
    window.location = "deliveries_delete.php?id="+deliveryID;
  }
}



</script>





</body>

</html>