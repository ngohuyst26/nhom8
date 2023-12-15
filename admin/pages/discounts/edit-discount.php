<?php
$_SESSION['code'] = 0;
$_SESSION['type'] = 0;
$_SESSION['discount'] = 0;
$_SESSION['description'] = 0;

//Lấy id của mã ưu đãi trên đường dẫn
$id = $_GET['id'];
$connect = new connect();
$tryvan = "SELECT * FROM discount WHERE id = $id";
$data = $connect->pdo_query_one($tryvan);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $code = $_POST['code'];
    $type = $_POST["type"];
    $discount = $_POST["discount"];
    $description = $_POST["description"];
    $number_use = $_POST["number_use"];
    $date_end = $_POST["date_end"];
//    $date_end = date('Y-m-d H:i:s');
//    var_dump($date_end);
    if (empty($code)) {
        $_SESSION['code'] = 1;
        $check = false;
    }
    if (empty($type)) {
        $_SESSION['type'] = 1;
        $check = false;
    }
    if (empty($discount)) {
        $_SESSION['discount'] = 1;
        $check = false;
    }
    if (empty($description)) {
        $_SESSION['description'] = 1;
        $check = false;
    }
    if (empty($_POST["number_use"])) {
        $number_use = 'null';
    }
    if (empty($_POST["date_end"])) {
        $date_end = 'null';
    }
    if (isset($_POST['type'])) {
        if ($type == 0) {
            if (isset($_POST['discount'])) {
                $discount = substr($discount, 0, 2);
            }
        }
    }
    $connect = new connect();
    if ($check == true) {
        $tryvan = "UPDATE discount SET code = ?, type = ?, discount =?, description = ?, `number_use` =  $number_use, `date_end` = ?  WHERE id = $id";
        $connect->pdo_execute($tryvan, $code, $type, $discount, $description, `$date_end`);
    }
}
?>
<div class="col-1"></div>
<div class="col-sm-12 col-xl-10 mt-3">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">MÃ ƯU ĐÃI</h6>
        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Nhập mã ưu đãi</label>
                <input type="text" name="code" value="<?= $data['code'] ?>" class="form-control" id="inputEmail3">
                <?php if ($_SESSION['code'] == 1): ?>
                    <p class="text-danger">Mã không được để trống</p>
                <?php endif; ?>
            </div>
            <div class="row mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="1" checked="">
                    <label class="form-check-label" for="gridRadios1">
                        Giảm theo phần trăm tổng đơn hàng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="2">
                    <label class="form-check-label" for="gridRadios2">
                        Giảm theo tổng tiền của đơn hàng
                    </label>
                </div>
                <?php if ($_SESSION['type'] == 1): ?>
                    <p class="text-danger">Loại không được để trống</p>
                <?php endif; ?>
            </div>
            <div class="row mb-3">
                <label for="input" class="form-label">Ưu đãi</label>
                <input type="text" name="discount" value="<?= $data['discount'] ?>" class="form-control"
                       id="inputPassword3">
                <?php if ($_SESSION['discount'] == 1): ?>
                    <p class="text-danger">Ưu đãi không được để trống</p>
                <?php endif; ?>
            </div>
            <div class="row mb-3">
                <label for="input" class="form-label">Mô tả</label>
                <input type="text" name="description" value="<?= $data['description'] ?>" class="form-control"
                       id="inputEmail3">
                <?php if ($_SESSION['description'] == 1): ?>
                    <p class="text-danger">Mô tả không được để trống</p>
                <?php endif; ?>
            </div>
            <div class="row mb-3">
                <label for="input" class="form-label">Số lần sử dụng</label>
                <input type="text" value="<?= $data['number_use'] ?>" name="number_use" class="form-control"
                       id="inputEmail3">
            </div>
            <div class="row mb-3">
                <label for="input" class="form-label">Ngày hết hạn</label>
                <input type="datetime-local" name="date_end" value="<?= $data['date_end'] ?>" class="form-control"
                       id="inputEmail3">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>
<div class="col-1"></div>