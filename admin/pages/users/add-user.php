<div class="col-3"></div>
<div class="col-sm-12 col-xl-6 mt-3">
    <form method="post" enctype="multipart/form-data">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">THÊM NGƯỜI DÙNG</h6>
        <div class="form-floating mb-3">
            <input type="text" name="user" class="form-control" id="floatingInput" placeholder="" required >
            <label for="floatingInput">Tên Người Dùng</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="" required >
            <label for="floatingInput">Email Người Dùng</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <label for="exampleInputEmail1">Chức Vụ</label><br/><br/>
            <input type="radio" name="chucvu" id="" value="1"> Admin
            <br/>
            <input type="radio" name="chucvu" id="" value="0"> Người Dùng
        </div>
        <br/>
        <button type="submit" class="btn btn-outline-primary">Thêm</button>
    </form>
    </div>
</div>
<div class="col-3"></div>