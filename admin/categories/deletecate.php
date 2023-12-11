<?php 
$id = $_GET['id'];
$data = new category();
$delete = $data->delete($id);

if ($delete['success']) {
    echo "<script>alert('".$delete['message']."');</script>";
} else {
    echo "<script>alert('".$delete['message']."');</script>";
}
echo "<script>document.location='?act=list';</script>";
?>
