<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number" style="color: white;"><?= $total_pelatihan ?></h2>
                                <span class="desc" style="color: white;">Total Pelatihan</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o" style="color: white;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number" style="color: white;"><?= $total_sertifikat ?></h2>
                                <span class="desc" style="color: white;">Total Semua Sertifikat</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note" style="color: white;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number" style="color: white;"><?= $total_bidang ?></h2>
                                <span class="desc" style="color: white;">Total Bidang</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-accounts-list-alt" style="color: white;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Chart Untuk Data Sertifikat</h5>

                                    <!-- Column Chart -->
                                    <div id="columnChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            var seriesData = [];

                                            <?php foreach ($chart_data as $row) : ?>
                                                var categoryName = '<?php echo $row->nama_bidang; ?>';
                                                var seriesName = '<?php echo $row->pelatihan; ?>'; // Menggunakan nama_pelatihan sesuai dengan query
                                                var dataIndex = seriesData.findIndex(item => item.name === categoryName);

                                                if (dataIndex === -1) {
                                                    seriesData.push({
                                                        name: categoryName,
                                                        data: [{
                                                            name: seriesName,
                                                            data: [<?php echo $row->total_peserta; ?>]
                                                        }]
                                                    });
                                                } else {
                                                    var seriesIndex = seriesData[dataIndex].data.findIndex(item => item.name === seriesName);
                                                    if (seriesIndex === -1) {
                                                        seriesData[dataIndex].data.push({
                                                            name: seriesName,
                                                            data: [<?php echo $row->total_peserta; ?>]
                                                        });
                                                    } else {
                                                        seriesData[dataIndex].data[seriesIndex].data.push(<?php echo $row->total_peserta; ?>);
                                                    }
                                                }
                                            <?php endforeach; ?>

                                            var finalSeriesData = [];
                                            seriesData.forEach(function(item) {
                                                var seriesItem = {
                                                    name: item.name,
                                                    data: item.data // Memasukkan data pelatihan secara langsung
                                                };
                                                finalSeriesData.push(seriesItem);
                                            });
                                            new ApexCharts(document.querySelector("#columnChart"), {
                                                series: [{
                                                    name: 'Data', // Ini adalah label untuk data Net Profit
                                                    data: finalSeriesData.flatMap(item => item.data.flatMap(subItem => subItem.data))
                                                }],
                                                chart: {
                                                    type: 'bar',
                                                    height: 350
                                                },
                                                plotOptions: {
                                                    bar: {
                                                        horizontal: false,
                                                        columnWidth: '20%',
                                                        endingShape: 'rounded'
                                                    },
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    show: true,
                                                    width: 2,
                                                    colors: ['transparent']
                                                },
                                                xaxis: {
                                                    categories: finalSeriesData.flatMap(item => item.data.flatMap(subItem => subItem.name))
                                                },
                                                yaxis: {
                                                    title: {
                                                        text: 'Total Sertifikat'
                                                    }
                                                },
                                                fill: {
                                                    opacity: 1
                                                },
                                                tooltip: {
                                                    y: {
                                                        formatter: function(val) {
                                                            return "Total " + val + " Sertifikat Latihan"
                                                        }
                                                    }
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Column Chart -->

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pie Chart Total Semua Sertifikat Pelatihan</h5>

                                    <!-- Pie Chart -->
                                    <div id="pieChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            var seriesData = [];

                                            <?php foreach ($chart_data as $row) : ?>
                                                var categoryName = '<?php echo $row->nama_bidang; ?>';
                                                var seriesName = '<?php echo $row->pelatihan; ?>'; // Menggunakan nama_pelatihan sesuai dengan query
                                                var dataIndex = seriesData.findIndex(item => item.name === categoryName);

                                                if (dataIndex === -1) {
                                                    seriesData.push({
                                                        name: categoryName,
                                                        data: [{
                                                            name: seriesName,
                                                            data: [<?php echo $row->total_peserta; ?>]
                                                        }]
                                                    });
                                                } else {
                                                    var seriesIndex = seriesData[dataIndex].data.findIndex(item => item.name === seriesName);
                                                    if (seriesIndex === -1) {
                                                        seriesData[dataIndex].data.push({
                                                            name: seriesName,
                                                            data: [<?php echo $row->total_peserta; ?>]
                                                        });
                                                    } else {
                                                        seriesData[dataIndex].data[seriesIndex].data.push(<?php echo $row->total_peserta; ?>);
                                                    }
                                                }
                                            <?php endforeach; ?>

                                            var finalSeriesData = [];
                                            seriesData.forEach(function(item) {
                                                var seriesItem = {
                                                    name: item.name,
                                                    data: item.data // Memasukkan data pelatihan secara langsung
                                                };
                                                finalSeriesData.push(seriesItem);
                                            });
                                            new ApexCharts(document.querySelector("#pieChart"), {
                                                series: finalSeriesData.flatMap(item => item.data.flatMap(subItem => subItem.data)),
                                                chart: {
                                                    height: 350,
                                                    type: 'pie',
                                                    toolbar: {
                                                        show: true
                                                    }
                                                },
                                                labels: finalSeriesData.flatMap(item => item.data.flatMap(subItem => subItem.name))
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Pie Chart -->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class=" card-footer">

                    BPSDMD SULUT

                </div>
            </div>
        </div>
    </div>
</div>