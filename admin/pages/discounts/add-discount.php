<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">MÃ ƯU ĐÃI</h6>
    <form method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="input" class="col-sm-2 col-form-label">Nhập mã ưu đãi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3">
            </div>
            <fieldset class="row mb-3">
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                        <label class="form-check-label" for="gridRadios1">
                            Giảm theo phần trăm tổng đơn hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
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
                <input type="text" class="form-control" id="inputPassword3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="input" class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="input" class="col-sm-2 col-form-label">Số lần sử dung</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Checkbox</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Check me out
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-primary">Danh sách ưu đãi</button>
    </form>
</div>