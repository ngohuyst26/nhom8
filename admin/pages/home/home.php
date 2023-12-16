<?php

    // Doanh Thu Tháng Này
    $totalOrderMonth = number_format(totalOrderByMonth(), 0, ".", ".");
    // Doanh Thu Kì Trước
    $totalOrderPreByMonth = number_format(totalOrderPreByMonth(), 0, ".", ".");
    // Đơn Hàng Tháng này
    $countOrderByMonth = countOrderByMonth();
    // Đơn Hàng Tháng trước
    $countPreOrderByMonth = countPreOrderByMonth();
    // Đơn Hàng all 
    $countAllOrder = countAllOrder();


    // Người Dùng Tháng Này
    $countUserByMonth = countUserByMonth();
    // Người Dùng Tháng TRƯỚC
    $countUserByPreMonth = countUserByPreMonth();
    // ALL USER
    $countAllUser  = countAllUser();

    // ORDER 
    $order = getAllOrder();

?>



<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Người Dùng Tháng Này</p>
                    <h6 class="mb-0"><?= $countUserByMonth ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Đơn Hàng Tháng này</p>
                    <h6 class="mb-0"><?= $countOrderByMonth ?></h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Doanh Thu Tháng Này</p>
                    <h6 class="mb-0"><?= $totalOrderMonth; ?> đ</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Doanh Thu Kì Trước</p>
                    <h6 class="mb-0"><?= $totalOrderPreByMonth; ?> đ</h6>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Biểu Đồ Người Dùng</h6>
                </div>
                <div class="chart rounded">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                    <canvas id="cha" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var xValues = ["Tháng Này", "Tháng Trước", "Tất Cả"];
                        var yValues = [
                            <?= $countUserByMonth ?>,
                            <?= $countUserByPreMonth ?>,
                            <?= $countAllUser ?>
                        ];
                        var barColors = ["red", "green", "blue"];

                        new Chart("cha", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Đơn Hàng</h6>
                </div>
                <div class="chart rounded">
                    <canvas id="mom" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var xValues = ["Tháng Này", "Tháng Trước", "Tất Cả"];
                        var yValues = [
                            <?= $countOrderByMonth ?>,
                            <?= $countPreOrderByMonth ?>,
                            <?= $countAllOrder ?>
                        ];

                        new Chart("mom", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Đơn Hàng Gần Đây</h6>
            <a href="/admin/?page=order&action=list">Xem tất cả</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Khách Hàng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tổng Tiền</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Ngày Đặt</th>

                        <th scope="col">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($order as $order) :
                    ?>
                        <tr>
                            <td><?= $order['customer_name'] ?></td>
                            <td><?= $order['customer_email'] ?></td>
                            <td><?= $order['total'] ?></td>
                            <td>Đang Giao</td>
                            <td><?= !empty($order['updated_at']) ? date('d-m-Y', strtotime($order['updated_at'])) : '' ?></td>
                            <td><a href="/admin/?page=order&action=order-detail&order=<?= $order['id'] ?>" class="btn-primary btn"><i class="fa-solid fa-info"></i></a></td>
                        </tr>

                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>