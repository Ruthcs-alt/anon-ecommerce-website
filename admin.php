<?php

@include 'config.php';

if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/' . $p_image;


    $insert_query = mysqli_query($conn, "INSERT INTO products (name, price, image) VALUES(' $p_name', '$p_price', '$p_image')") or die("Query Failed");

    if($insert_query){
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = "Product Added Successfully";
    }else{
        $message[] = "Could not add the new product";
    }


}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM products WHERE id=$delete_id");
    if($delete_query){
        $message[] = "product deleted";
    }else{
        $message[] = "product could not be deleted";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    

</head>
<body>

    <?php
    
    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message"><span>'. $message .'</span> <i class="fas fa-times" onclick="this.parentElement.style.display=`none`;"></i></div>';
        }
    };
    
    ?>

    <?php include 'header.php'; ?>
    
    <div class="container">

        <section>

            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3>Add a New Product</h3>
                <input type="text" name="p_name" placeholder="Enter the Product Name" class="box" required>
                <input type="number" name="p_price" min="0" placeholder="Enter the Product Price" class="box" required>
                <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                <input type="submit" value="Add the Product" name="add_product" class="btn">
            </form>

        </section>

        <section class="display-product-table">

            <table>
                <thead>
                    <th>product image</th>
                    <th>product name</th>
                    <th>product price</th>
                    <th>actions</th>
                </thead>

                <tbody>
                    <?php
                    
                    $select_products = mysqli_query($conn, "SELECT * FROM products");
                    if(mysqli_num_rows($select_products) > 0){
                        while($row = mysqli_fetch_assoc($select_products)){

                    ?>

                    <tr>
                        <td><img src="uploaded_img/<?= $row['image'] ?>" height="100"></td>
                        <td><?= $row['name'] ?></td>
                        <td>$<?= $row['price'] ?>/-</td>
                        <td>
                            <a href="admin.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fas fa-trash"></i> delete</a>
                            <a href="admin.php?edit=<?= $row['id'] ?>" class="option-btn" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fas fa-edit"></i> update</a>
                        </td>
                    </tr>        

                    <?php
                    
                        };
                    }else{
                        echo "<span>no product added</span>";
                    }
                    
                    ?>
                </tbody>
            </table>

        </section>

    </div>








    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>
</html>