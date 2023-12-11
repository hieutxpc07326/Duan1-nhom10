<?php 
session_start(); 
ob_start();
if(!isset($_SESSION["giohang"])){
    $_SESSION["giohang"]=[];
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HKH SHOP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo-mini.jpg">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="public/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="public/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="public/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="public/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="public/css/custom.css">
    <!-- Modernizr JS -->
    <link rel="stylesheet" href="public/css/comments.css">
    <style>
        .wrapper{
            font-family: "sans-serif";
        }

    </style>
    <script src="public/js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
    <!-- Body main wrapper start -->
    <div class="wrapper" style="font-family: 'sans-serif';"></div>
    <?php
    include('public/includes/header.php');
    include('admin/includes/pdo.php');
    include('admin/products/pro.php');
    include('admin/categories/category.php');
    include('public/includes/giohang.php');
    include('admin/users/user.php');
    if (isset($_GET['act'])) {
        $tam = $_GET['act'];
    } else {
        $tam = '';
    }
    if (isset($_GET['act'])) {
        switch ($tam) {
            case "shop":
                include('public/includes/shoppage.php');
                break;
            case "home":
                include('public/includes/page.php');
                break;
            case "contact":
                include('public/includes/contact.php');
                break;
            case "viewcart":
                if(isset($_GET['del'])&&($_GET['del']==1)){
                    unset($_SESSION['giohang']);
                    header ('location: ?act=viewcart');
                }else{
                    if(isset($_SESSION['giohang'])){
                        $tongdonhang=get_tongdonhang();
                    }
                    include('public/includes/cart.php');
                }
            case "addcart":
                if(isset($_POST['addcart'])){
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = $_POST['soluong'];
                    $sp=array("name"=>$name,"img"=>$img ,"price"=>$price, "soluong"=>$soluong);
                    array_push($_SESSION["giohang"], $sp);
                    echo var_dump($_SESSION["giohang"]);
                    header ('location: ?act=viewcart');
                }
                break;
            case "detail":
                include('public/includes/productdetail.php');
                break;
                case "login":
                    if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
                        header("Location: public/login.php");
                    }else{
                    header("Location: index.php");
                    }
                    break;
                case "register":
                    include('public/register.php');
                    break;
                case "profile":
                    include('public/profile.php');
                    break;
                case "logoutUser":
                    unset($_SESSION['user']);
                    session_destroy();
                    header("location:index.php");
                    break;
            default:
                include('public/includes/page.php');
        }
    } else {
        include('public/includes/page.php');
    }
    include('public/includes/footer.php');
    ?>
    </div>
    <!-- Body main wrapper end -->
    <script src="public/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="public/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="public/js/plugins.js"></script>
    <script src="public/js/slick.min.js"></script>
    <script src="public/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="public/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="public/js/main.js"></script>

</body>

</html>