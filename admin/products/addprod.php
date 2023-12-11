<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $category_ID = $_POST['category_ID'];
    $discount = $_POST['discount'];

    if(empty($name)){
        $errorName = "Vui lòng nhập tên sản phẩm";
    }
    if(empty($price) || is_numeric($price)){
        $errorPrice = "Vui lòng nhập số";
    }
    if(empty($image)){
        $errorImage = "Vui lòng thêm hình ảnh";
    }
    if(empty($description)){
        $errorDesc = "Vui lòng nhập mô tả sản phẩm";
    }
    if(empty($category_ID)){
        $errorCate = "Vui lòng chọn danh mục sản phẩm";
    }
   
}
?>
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
                <?php 
            if(!empty($errorName)){
                echo '<p style="color:red;">'.$errorName.'</p>';
            }
            ?>
            </div>
            <div class="">
                <label for="price">Price:</label>
                <br>
                <input type="number" class="form-control" id="price" name="price" placeholder="Giá ">
                <?php 
            if(!empty($errorPrice)){
                echo '<p style="color:red;">'.$errorPrice.'</p>';
            }
            ?>
            </div>
            <div class="">
                <label for="image">Image:</label>
                <br>
                <input type="file" class="form-control" id="image" name="image" >
                <?php 
            if(!empty($errorImage)){
                echo '<p style="color:red;">'.$errorImage.'</p>';
            }
            ?>
            </div>
            <div class="">
                <label for="description">Description:</label>
                <br>
                <textarea class="form-control" id="description" name="description" rows="4" ></textarea>
                <?php 
            if(!empty($errorDesc)){
                echo '<p style="color:red;">'.$errorDesc.'</p>';
            }
            ?>
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
                <?php } ?>
                </select>
            </div>
            <div class="">
                <label for="discount">Discount:</label>
                <br>
                <input type="number" class="form-control" id="discount" name="discount" >
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
    // Thực hiện thêm sản phẩm
    $db = new Products();
    $result = $db->add($name, $price, $image, $description, $category_ID, $discount);

    // Upload hình ảnh
    move_uploaded_file($image_tmp, '../images/' . $image);
  

    // Chuyển hướng sau khi thêm

} 

?>