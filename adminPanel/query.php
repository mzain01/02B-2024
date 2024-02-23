    <?php
    include('dbcon.php');
    session_start();
    if (isset($_POST['signin'])){
        $uEmail = $_POST['uEmail'];
        $uPassword = $_POST['uPassword'];
        $query = $pdo->prepare("select * from user where email = :usEmail AND password = :usPassword");
        $query->bindParam('usEmail',$uEmail);
        $query->bindParam('usPassword',$uPassword);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user['role_id'] == 1 ){
            $_SESSION['adminEmail']= $user['email'];
            $_SESSION['adminName']= $user['name'];
            $_SESSION['adminId']= $user['id'];
            echo "<script>alert('Admin Signin sucessfully');
            location.assign('index.php');
            </script>";
        }
        else if($user['role_id']==2){
            $_SESSION['userEmail']= $user['email'];
            $_SESSION['userName']= $user['name'];
            $_SESSION['userId']= $user['id'];
            echo "<script>alert('user Signin sucessfully');
            location.assign('website.php');
            </script>";
        }
        print_r($user);
        
        
        
    
    }


    // add category //

    if(isset($_POST['addCategory'])){
        $cName = $_POST['categoryName'];
        $cDes = $_POST['categoryDescription'];
        $imageName = $_FILES['categoryImage']['name'];
        $imageTempName =  $_FILES['categoryImage']['tmp_name'];
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $destination = "img/". $imageName;
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
            if(move_uploaded_file($imageTempName, $destination)){
                $query = $pdo->prepare("insert into categories (name , image , des) values (:cName, :cImage, :cDes)");
                $query->bindParam('cName', $cName);
                $query->bindParam('cImage', $imageName);
                $query->bindParam('cDes' ,$cDes);
                $query->execute();
                echo "<script>alert('Category added succesfully')
                location.assign('index.php')</script>";
            }
            else{
                echo"<script>alert('invalid extension')</script>";
            }
        }
    }



    //UPDATE CATEGORY//
    if(isset($_POST['updateCategory'])){
        $id = $_GET['id'];
        $cName = $_POST['categoryName'];
        $cDes = $_POST['categoryDescription'];
        $query = $pdo->prepare("update categories set name = :cName, des = :cDes where id = :cId");
        if (isset($_FILES['categoryImage'])){
            $cImageName = $_FILES['categoryImage']['name'];
            $cImageTmpName = $_FILES['categoryImage']['tmp_name'];
            $extension = pathinfo($cImageName, PATHINFO_EXTENSION);
            $destination = "img/". $cImageName;
            if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
                if (move_uploaded_file($cImageTmpName,$destination)){
                    $query = $pdo->prepare("update categories set name = :cName, des = :cDes, image = :cImage where id = :cId");
                    $query->bindParam('cImage', $cImageName);
                }
            }
        }
        $query->bindParam('cName', $cName);
        $query->bindParam('cDes', $cDes);
        $query->bindParam('cId', $id);
        $query->execute();
        echo "<script>alert('category updated Successfully');
        </script>";
    }



    //product

    if(isset($_POST['addProduct'])){
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productPrice = $_POST['productPrice'];
        $productQty = $_POST['productQty'];
        $cId = $_POST['cId'];    
        $imageName = $_FILES['productImage']['name'];
        $imageTempName =  $_FILES['productImage']['tmp_name'];
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $destination = "img/". $imageName;
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
            if(move_uploaded_file($imageTempName, $destination)){
                $query = $pdo->prepare("insert into products (name ,des, qty, price, image, c_id) values (:pName, :pDes, :pqty, :pPrice, :pImage, :cId)");
                $query->bindParam('pName', $productName);
                $query->bindParam('pDes', $productDescription);
                $query->bindParam('pqty' ,$productQty);
                $query->bindParam('pPrice' ,$productPrice);
                $query->bindParam('pImage' ,$imageName);
                $query->bindParam('cId' ,$cId);
                $query->execute();
                echo "<script>alert('Product added succesfully');
                location.assign('index.php')</script>";
            }
            else{
                echo"<script>alert('invalid extension')</script>";
            }
        }
    }


//edit product
if(isset($_POST['editProduct'])){
    $id = $_GET['id'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQty = $_POST['productQty'];
    $productDes = $_POST['productDescription'];
    $productCid = $_POST['cId'];
    $query = $pdo->prepare("update products set name = :pName, price = :pPrice, des = :pDes, qty = :pQty, c_id = :cId where id = :id");
    if (isset($_FILES['productImage'])){
        $productImageName = $_FILES['productImage']['name'];
        $productImageTmpName = $_FILES['productImage']['tmp_name'];
        $extension = pathinfo($productImageName, PATHINFO_EXTENSION);
        $destination = 'img/'.$productImageName;
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
            if(move_uploaded_file($productImageTmpName, $destination)){
                $query = $pdo->prepare("update products set name = :pName, image = :pImage, price = :pPrice, des = :pDes, qty = :pQty, c_id = :cId where id = :id");
                $query->bindParam('pImage', $productImageName);
            }
        }

    }
    $query->bindParam('cId',$productCid);
    $query->bindParam('id',$id);
    $query->bindParam('pName',$productName);
    $query->bindParam('pPrice',$productPrice);
    $query->bindParam('pQty',$productQty);
    $query->bindParam('pDes',$productDes);
    $query->execute();
    echo "<script>alert('product updated Successfully');
    </script>";

}?>

