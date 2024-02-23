<?php
include('query.php');
 include('header.php');
  ?>
   <?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare("select * from categories where id = :id");
    $query->bindParam('id', $id);
    $query->execute();
    $cat =  $query->fetch(PDO::FETCH_ASSOC);
  }
  ?>
            <!-- Blank Start -->            
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>EDIT CATEGORY</h3>
                        <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" value="<?php echo $cat['name'] ?>" name="categoryName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" name="categoryImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <span><?php echo $cat['image']?></span>
                        </div>
                        <div class="form-group">
                          <label for="">Des</label>
                          <input type="text" value="<?php echo $cat['des'] ?>" name="categoryDescription" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <button class="btn btn-info mt-4" type="submit" name="updateCategory">Update Category</button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php include('footer.php') ?>