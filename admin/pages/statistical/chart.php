<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Biểu đồ thống kê sản phẩm</h6>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

        <canvas id="myChart" style="width:100%;max-width:900px"></canvas>

        <script>
            var xValues = ["IPHONE", "SAMSUNG", "XIAOMI", "VIVO", "NOKIA"];
            var yValues = [55, 49, 44, 24, 15];
            var barColors = ["red", "green", "blue", "orange", "brown"];

            new Chart("myChart", {
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
                        text: "World Wine Production 2018"
                    }
                }
            });
        </script>

    </div>
</div>