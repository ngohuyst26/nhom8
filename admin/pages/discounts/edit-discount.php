<?php
$_SESSION['code'] = 0;
$_SESSION['type'] = 0;
$_SESSION['discount'] = 0;
$_SESSION['description'] = 0;
$_SESSION['number_use'] = 0;
$_SESSION['date_end'] = 0;

$id = $_GET['id'];
$connect = new connect();
$tryvan = "SELECT * FROM discount WHERE id = $id";
$data = $connect->pdo_query($tryvan);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $code = $_POST['code'];
    $type = $_POST["type"];
    $discount = $_POST["discount"];
    $description = $_POST["description"];
    $number_use = $_POST["number_use"];
    $date_end = $_POST["date_end"];
    $connect = new connect();
    if(empty($code)){
        $_SESSION['code'] = 1;
        $check = false;
    }
    if(empty($type)){
        $_SESSION['type'] = 1;
        $check = false;
    }
    if(empty($discount)){
        $_SESSION['discount'] = 1;
        $check = false;
    }
    if(empty($description)){
        $_SESSION['description'] = 1;
        $check = false;
    }
    if(empty($number_use)){
        $_SESSION['number_use'] = 1;
        $check = false;
    }
    if(empty($date_end)){
        $_SESSION['date_end'] = 1;
        $check = false;
    }
    if($check == true){
        $tryvan = "UPDATE discount SET code = '$code', type = '$type', discount ='$discount', description = '$description', number_use =  '$number_use', date_end = '$date_end' WHERE id = $id";
        $connect->pdo_execute($tryvan);
    }
}
?>
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">SỬA MÃ ƯU ĐÃI</h6>
    <?php foreach ($data as $discounts): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Sửa mã ưu đãi</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $discounts['code'] ?>" name="code" class="form-control" id="inputEmail3">
                </div>
                <?php if($_SESSION['code'] == 1): ?>
                    <p>Không được để trống!!!</p>
                <?php endif; ?>
                <fieldset class="row mb-3">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="0" checked="">
                            <label class="form-check-label" for="gridRadios1">
                                Giảm theo phần trăm tổng đơn hàng
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="1">
                            <label class="form-check-label" for="gridRadios2">
                                Giảm theo tổng tiền của đơn hàng
                            </label>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Ưu đãi</label>
                <div class="col-sm-10">
                    <input type="text" VALUE="<?= $discounts['discount'] ?>" name="discount" class="form-control" id="inputPassword3">
                </div>
                <?php if($_SESSION['discount'] == 1): ?>
                    <p>Không được để trống!!!</p>
                <?php endif; ?>
            </div>
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $discounts['description'] ?>" name="description" class="form-control" id="inputEmail3">
                </div>
                <?php if($_SESSION['description'] == 1): ?>
                    <p>Không được để trống!!!</p>
                <?php endif; ?>
            </div>
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Số lần sử dụng</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $discounts['number_use'] ?>" name="number_use" class="form-control" id="inputEmail3">
                </div>
                <?php if($_SESSION['number_use'] == 1): ?>
                    <p>Không được để trống!!!</p>
                <?php endif; ?>
            </div>
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Ngày hết hạn</label>
                <div class="col-sm-10">
                    <input type="date" value="<?= $discounts['date_end'] ?>" name="date_end" class="form-control" id="inputEmail3">
                </div>
                <?php if($_SESSION['date_end'] == 1): ?>
                    <p>Không được để trống!!!</p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php endforeach; ?>
</div>