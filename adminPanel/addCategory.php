<?php
include('query.php');
 include('header.php');
  ?>


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>ADD CATEGORY</h3>
                        <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="categoryName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" name="categoryImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="">Des</label>
                          <input type="text" name="categoryDescription" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <button class="btn btn-info" type="submit" name="addCategory">Add Category</button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php include('footer.php') ?>