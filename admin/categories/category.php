<?php
class category
{
 // Khai báo thuộc tính
 var $id = null;
 var $name = null;
 var $create = null;
 var $status = null;
 var $update = null;


 // hàm lấy tất cả dữ liệu của bảng Categoris
 public function getList() {
     $db = new connect();
     $query = "SELECT * FROM categories"; // viết câu lệnh sql select *
     $result = $db->pdo_query($query);
     return $result;
 }

 // hàm lấy 1 dòng dữ liệu của bảng categoris dựa trên id
 public function getByID($id) {
     $db = new connect();
     $query = "SELECT * FROM categories where categoryID = '$id'";
     $result = $db->pdo_query_one($query);
     return $result;
 }

 //hàm insert dữ liệu, create dữ liệu, thêm mới dữ liệu


 //hàm cập nhập dữ liệu

 public function countCate(){
     $db = new connect();
     $sql = "SELECT COUNT(categoryID) AS countCate FROM categories";
     $result = $db->pdo_execute($sql);
     return $result;
 }
 public function update($name, $id){
    $db = new connect();
    $query = "UPDATE categories SET categoryName = '$name', updated = now() WHERE categoryID = '$id'";
    $result = $db->pdo_execute($query);
    return $result;
}
public function add($name) {
    $db = new connect();
    $existingCategory = $this->getByName($name);
    if ($existingCategory) {
        return false;
    }
    $query = "INSERT INTO categories (categoryID, categoryName) VALUES (null, '$name')";
    $result = $db->pdo_execute($query);
    return $result;
}
public function getByName($name) {
    $db = new connect();
    $query = "SELECT * FROM categories WHERE categoryName = '$name'";
    $result = $db->pdo_query_one($query);
    return $result;
}
public function loadCate($id)
{
    $db = new connect();
    $sql = "SELECT * FROM categories WHERE categoryID = ?";
    $cate = $db->pdo_query_one($sql, [$id]);

    if ($cate) {
        return $cate['categoryName']; // Sửa lại để truy cập đúng tên cột
    } else {
        return "";
    }
}
public function delete($id)
    {
        $db = new connect();
        if ($this->hasAssociatedProducts($id)) {
            return ['success' => false, 'message' => 'Không thể xóa danh mục vì còn sản phẩm chứa danh mục .'];
        }
        $query = "DELETE FROM categories WHERE categoryID = :id";
        $params = [':id' => $id];
        $result = $db->pdo_query_one($query, $params);

        if ($result !== true) {
            return ['success' => true, 'message' => 'Xóa danh mục thành công.'];

        }
    }

public function hasAssociatedProducts($categoryID)
{
    $db = new connect();
    $sql = "SELECT COUNT(*) FROM products WHERE category_ID = :categoryID";
    $params = [':categoryID' => $categoryID];

    $result = $db->pdo_query_one($sql, $params);

    return intval($result['COUNT(*)']) > 0;
}

}


?>