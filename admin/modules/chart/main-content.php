<?php
    // Date params
    $fromDate = "2019/03/24";
    $toDate = "2019/03/24";
    if (isset($_GET['from'])) $fromDate = $_GET['from'];
    if (isset($_GET['to'])) $toDate = $_GET['to'];
?>

<main id="main" data-page-content="chart">
    <div class="container">
        <?php
            // Alert boxes
            // include('webpage-components/alert-box.php');
        ?>

        <div class="row">
            <div class="col-md-3">
                <section>
                    <?php
                        echo "<b>Xem biểu đồ thống kê doanh thu</b>";
                        echo "<hr>";
                        renderAside();
                    ?>
                </section>
            </div>
        </div>
        <br>

        <?php
            //Queries
            $sqlGetAllOrder = "SELECT * FROM [dbo].[cart]";

            $sqlGetOrdDetailByProduct = "SELECT * FROM [dbo].[cart_detail] WHERE procuct_id = ?";
            //Query for cart
            $sqlGetOrderBtwDate = "SELECT * FROM [dbo].[cart] WHERE cart_date BETWEEN '" . $fromDate . "' AND  '" . $toDate . "'";
            $sqlGetOrderByCustomer = "SELECT * FROM [dbo].[cart] WHERE customer_id = ?";
            $sqlGetOrderByStock = "SELECT * FROM [dbo].[cart] WHERE stock_id = ?";

            $resultArray = [];
            $query = sqlsrv_query($conn, $sqlGetOrderBtwDate);
            if ( $query === false) {
                die( print_r(sqlsrv_errors(), true));
            }

            while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                array_push($resultArray, $result);
            }

            //"Debug"
            // echo json_encode($resultArray);  

            $fp = fopen('data/order-statistics.json', 'w');
            fwrite($fp, json_encode($resultArray));
            fclose($fp);
        ?>

        <div class="row">
            <div class="col-md-12">
                <section class="right">
                    <!-- Data processing -->
                    <script type="text/javascript">
                        const monthsOfYear = {
                            01: "Tháng 1",
                            02: "Tháng 2",
                            03: "Tháng 3",
                            04: "Tháng 4",
                            05: "Tháng 5",
                            06: "Tháng 6",
                            07: "Tháng 7",
                            08: "Tháng 8",
                            09: "Tháng 9",
                            10: "Tháng 10",
                            11: "Tháng 11",
                            12: "Tháng 12"
                        }



                        $.getJSON("data/order-statistics.json", function(data) {
                            var myData = data;
                            console.log(myData);
                        });
                    </script>

                    <!-- Chart display -->
                    <canvas id="chart" style="width: 100%; height: auto;"></canvas>
                    <script type="text/javascript">
                        var ctx = document.getElementById('chart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </section>
            </div>
        </div>
    </div>
</main>