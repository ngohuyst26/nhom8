
<?php
//session_start();
?>
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="/admin" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <span><?=$_SESSION['user']?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/admin" class="nav-item nav-link <?= (!isset($_GET['page'])) ? 'active' : '' ?>"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#"
                   class="nav-link dropdown-toggle <?= (isset($_GET['page']) && $_GET['page'] == 'product') ? 'active' : '' ?>"
                   data-bs-toggle="dropdown"><i class="fa-solid fa-box-archive"></i> Sản phẩm</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="?page=product&action=add" class="dropdown-item">Thêm sản phẩm</a>
                    <a href="?page=product&action=list" class="dropdown-item">Danh sách sản phẩm</a>
                    <a href="?page=product&action=del" class="dropdown-item">Thùng rác</a>
                    <a href="?page=product&action=draft" class="dropdown-item">Bản nháp</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#"
                   class="nav-link dropdown-toggle <?= (isset($_GET['page']) && $_GET['page'] == 'order') ? 'active' : '' ?>"
                   data-bs-toggle="dropdown"><i class="fa-solid fa-cart-shopping"></i> Đơn hàng</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="?page=order&action=list" class="dropdown-item">Danh sách đơn hàng</a>
                    <!--                    <a href="?page=statistical&action=products" class="dropdown-item">Thống Kê Sản Phẩm</a>-->
                </div>
            </div>


            <div class="nav-item dropdown">
                <a href="#"
                   class="nav-link dropdown-toggle <?= (isset($_GET['page']) && $_GET['page'] == 'users') ? 'active' : '' ?>"
                   data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i> Người Dùng</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="?page=users&action=add" class="dropdown-item">Thêm người dùng</a>
                    <a href="?page=users&action=list" class="dropdown-item">Danh sách người dùng</a>
                </div>

                <div class="nav-item dropdown">
                    <a href="#"
                       class="nav-link dropdown-toggle <?= (isset($_GET['page']) && $_GET['page'] == 'posts') ? 'active' : '' ?>"
                       data-bs-toggle="dropdown"><i class="fa-solid fa-pen-nib"></i> Bài Viết</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="?page=posts&action=add" class="dropdown-item">Thêm Bài Viết</a>
                        <a href="?page=posts&action=list" class="dropdown-item">Danh sách Bài Viết</a>
                        <a href="?page=categoriesPost&action=list" class="dropdown-item">Danh Mục Bài Viết</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#"
                       class="nav-link dropdown-toggle <?= (isset($_GET['page']) && $_GET['page'] == 'discounts') ? 'active' : '' ?>"
                       data-bs-toggle="dropdown"><i class="fa-solid fa-tags"></i> Mã ưu đãi</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="?page=discounts&action=add-discount" class="dropdown-item">Thêm mã ưu đãi</a>
                        <a href="?page=discounts&action=list-discount" class="dropdown-item">Danh sách ưu đãi</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#"
                       class="nav-link dropdown-toggle <?= (isset($_GET['page']) && $_GET['page'] == 'category') ? 'active' : '' ?>"
                       data-bs-toggle="dropdown"><i class="fa-solid fa-list-ul"></i>Loại sản phẩm</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="?page=category&action=add" class="dropdown-item">Thêm loại sản phẩm</a>
                        <a href="?page=category&action=list" class="dropdown-item">Danh sách loại sản phẩm</a>
                    </div>
                </div>
    </nav>
</div>
<!-- Sidebar End -->