<?php
//Them ma uu dai
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $code = $_POST["code"];
    $type = $_POST["type"];
    $discount = $_POST["discount"];
    $description = $_POST["description"];
    $number_use = $_POST["number_use"];
    $date_end = $_POST["date_end"];
    $connect = new connect();
    $tryvan = "INSERT INTO discount (code , type, discount, description, number_use, date_end) 
               VALUES ('$code', '$type', '$discount', '$description', '$number_use', '$date_end')";
    $connect->pdo_execute($tryvan);
}
?>
<div class="col-1"></div>
<div class="col-sm-12 col-xl-10 mt-3">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">MÃ ƯU ĐÃI</h6>
        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Nhập mã ưu đãi</label>
                <div class="col-sm-10">
                    <input type="text" name="code" class="form-control" id="inputEmail3">
                </div>
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
                    <input type="text" name="discount" class="form-control" id="inputPassword3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="inputEmail3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Số lần sử dụng</label>
                <div class="col-sm-10">
                    <input type="text" name="number_use" class="form-control" id="inputEmail3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="input" class="col-sm-2 col-form-label">Ngày hết hạn</label>
                <div class="col-sm-10">
                    <input type="date" name="date_end" class="form-control" id="inputEmail3">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="col-1"></div>