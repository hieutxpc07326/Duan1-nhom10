<?php
// Giả sử userId cần update là 1
$userId = 1;

// Object tương tác database
$userObj = new User();

// Khởi tạo thông báo
$msg = '';

// Lấy thông tin user trước khi cập nhật
$oldUser = $userObj->getByID($userId);

// Xử lý submit
if (isset($_POST['submit'])) {

    // Lấy dữ liệu từ form (sử dụng isset để tránh lỗi undefined index)
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Validate dữ liệu
    // ...

    // Cập nhật dữ liệu
    $result = $userObj->updateUser($username, $password, $fullname, $email, $address, $phone, $userId);

    // Thông báo
    $msg = $result ? "Cập nhật thành công!" : "Có lỗi xảy ra!";

    // Lấy thông tin user sau khi cập nhật
    $user = $userObj->getByID($userId);
}
?>

<!-- Hiển thị thông báo -->
<?php if (!empty($msg)) : ?>
    <p><?= $msg ?></p>
<?php endif; ?>
<form method="post">

    <div class="form-group">
        <label>Tên tài khoản</label>
        <!-- Sử dụng giá trị cũ từ $oldUser -->
        <input type="text" name="username" value="<?= htmlspecialchars($oldUser['UserName'] ?? ''); ?>">
    </div>

    <div class="form-group">
        <label>Mật khẩu</label>
        <input type="password" name="password">
    </div>

    <div class="form-group">
        <label>Tên đầy đủ</label>
        <!-- Sử dụng giá trị cũ từ $oldUser -->
        <input type="text" name="fullname" value="<?= htmlspecialchars($oldUser['FullName'] ?? ''); ?>">
    </div>

    <div class="form-group">
        <label>Địa chỉ</label>
        <!-- Sử dụng giá trị cũ từ $oldUser -->
        <input type="text" name="address" value="<?= htmlspecialchars($oldUser['Address'] ?? ''); ?>">
    </div>

    <div class="form-group">
        <label>Số điện thoại</label>
        <!-- Sử dụng giá trị cũ từ $oldUser -->
        <input type="text" name="phone" value="<?= htmlspecialchars($oldUser['Phone'] ?? ''); ?>">
    </div>

    <div class="form-group">
        <label>Email</label>
        <!-- Sử dụng giá trị cũ từ $oldUser -->
        <input type="email" name="email" value="<?= htmlspecialchars($oldUser['Email'] ?? ''); ?>">
    </div>

    <button type="submit" name="submit">Cập nhật</button>
</form>

<style>
/* Định dạng phần tử form */
form {
    max-width: 400px;
    margin: 0 auto;
}

/* Định dạng nhóm các trường nhập liệu */
.form-group {
    margin-bottom: 15px;
}

/* Định dạng nhãn của trường nhập liệu */
label {
    display: block;
    margin-bottom: 5px;
}

/* Định dạng trường nhập liệu */
input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

/* Định dạng nút submit */
button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Định dạng nút submit khi di chuột qua */
button:hover {
    background-color: #45a049;
}
</style>
