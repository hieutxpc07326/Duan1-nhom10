<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Product</h4>
        </div>
        <form method="post"  enctype="multipart/form-data">
            <div class="">
                <label for="name">Name:</label>
                <br>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm " >
                <span class="error"></span>
            </div>
            <div class="">
                <label for="price">Price:</label>
                <br>
                <input type="number" class="form-control" id="price" name="price" placeholder="Giá ">
                <span  class="error"></span>
            </div>
            <div class="">
                <label for="image">Image:</label>
                <br>
                <input type="file" class="form-control" id="image" name="image" >
                <span class="error"></span>
            </div>
            <div class="">
                <label for="description">Description:</label>
                <br>
                <textarea class="form-control" id="description" name="description" rows="4" ></textarea>
                <span class="error"></span>
            </div>
            <div class="">
                <label for="category_ID">Category:</label>
                <br>
                <select class="form-control" id="category_ID" name="category_ID" >
                <?php
                $dbCate = new Category();
                $rows = $dbCate->getList();
                foreach ($rows as $row) { ?>
                    <option value="<? echo $row['categoryID'] ?>"><? echo $row['categoryName'] ?></option>
                    <span  class="error"></span>
                <?php } ?>
                </select>
            </div>
            <div class="">
                <label for="discount">Discount:</label>
                <br>
                <input type="number" class="form-control" id="discount" name="discount" >
                <span  class="error"></span>
            </div>
            <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
        </form>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['addProduct'])) {
    // Lấy dữ liệu từ biểu mẫu
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];
    $category_ID = $_POST['category_ID'];
    $discount = $_POST['discount'];
    $errors = [];

    $db = new Products();
    $result = $db->add($name, $price, $image, $description, $category_ID, $discount);
  
    move_uploaded_file($image_tmp, '../images/' . $image);
    
    
  

} 

?>


