<div class="card border-light bg-secondary">
  <div class="card-header border-end border-light">
    <p class="mt-2 fw-bold">Thêm Danh Mục</p>
  </div>
  <div class="card-body">
    <form action="/admin/pages/postCate/handel.php" method="POST" enctype="multipart/form-data" id="formcate">
      <div class="mb-3">
        <p class="fw-bold">Tên Danh Mục</p>
        <input type="text" class="form-control border" name="name" value="" placeholder="Viết Tên Danh Mục...">
      </div>
      <div class="mb-3">
        <p class="fw-bold">Slug</p>
        <input type="text" class="form-control border" name="slug" value="" placeholder="Slug...">
      </div>
      <div class="mb-2">
        <h6 class="h6 fw-bold">Mô Tả</h6>
        <textarea class="form-control" placeholder="Mô tả..." name="content" id="floatingTextarea" style="height: 150px;"></textarea>
      </div>
      <input type="submit" name="add" id="" value="Thêm Mới" class="btn btn-primary mt-2 w-100">
    </form>
  </div>
</div>