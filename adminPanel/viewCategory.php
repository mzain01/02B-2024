<?php
include('query.php');
 include('header.php');
  ?>


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>View Category</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $query = $pdo->query("select * from categories");
                            $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($allCategories as $cat){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $cat['name'] ?></td>
                                    <td><?php echo $cat['des'] ?></td>
                                    <td><img height = "100px" src="img/<?php echo $cat['image']?>" alt=""></td>
                                    <td><a href="editCategory.php?id=<?php echo $cat['id'] ?>" class= "btn btn-primary">Edit</a></td>
                                    <td><a href="?did= <?php echo $cat['id'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php include('footer.php') ?>