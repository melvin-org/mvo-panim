<!DOCTYPE html>
<html>

<style>
    /*for add collection modal */
    .bg-modal-addCollection {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
    }

    .modal-content-addCollection {
        width: 1000px;
        height: 400px;
        background-color: white;
        border-radius: 4px;
        /* text-align: center; */
        padding: 20px;
        position: relative;
    }



</style>

<body>
    <!-- add collection -->

    <div class="bg-modal-addCollection">

        <div class="modal-content-addCollection">
            <form class="form-horizontal" method="POST" action="collections_add.php" id="addform" enctype="multipart/form-data">

                <?php

                $con = mysqli_connect("localhost", "admin", null, "pganim");
                $query = "SELECT * FROM collections";
                $result = mysqli_query($con, $query);

                ?>

                <div class="form-group">
                    <br>
                    <label for="collectionname" class="col-sm-2 control-label">Collection Name</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="collectionname" name="collectionname" required>
                    </div>

                </div>

                <div class="form-group">
                    <label for="collectiondesc" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                        <textarea name="collectiondesc" rows="10" cols="100" required></textarea>
                    </div>

                </div>
                </form>
                <div class="modal-footer">
                    <a href="collections.php"><button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button></a>
                    <button type="submit" form="addform" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Add</button>
                </div>
            
        </div>
    </div>



</body>

</html>