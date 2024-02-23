<?php
include('query.php');
 include('header.php');
  ?>


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>View Product</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Categories</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $query = $pdo->query("select products.* , categories.name as cName, categories.id as cId from products inner join categories on products.c_id = categories.id");
                            $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($allCategories as $cat){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $cat['name'] ?></td>
                                    <td><?php echo $cat['des'] ?></td>
                                    <td><?php echo $cat['qty'] ?></td>
                                    <td><?php echo $cat['price'] ?></td>
                                    <td><?php echo $cat['cName'] ?></td>
                                    <td><img height = "100px" src="img/<?php echo $cat['image']?>" alt=""></td>
                                    <td><a href="editProduct.php?id=<?php echo $cat['id'] ?>" class= "btn btn-primary">Edit</a></td>
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