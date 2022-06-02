<!DOCTYPE html>
<?php
/**
 * SESSION
 */
session_start();
$restaurantID = $_SESSION['restaurantID'];
// $_SESSION['restaurantID'] = 1;

include 'actions/read_insight_info.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="styles/restaurant_owner.css">
    <link rel="stylesheet" href="styles/report.css">

    <!-- js chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function init() {
            const barColors = "#6C5A8A";
            /**
             * Chart payment last month
             */
            const xPaymentLastMonth = ["Week 1", "Week 2", "Week 3", "Week 4"];
            const yPaymentLastMonth = <?php echo json_encode($sum) ?>;
            document.getElementById('maxPayment').innerHTML = Math.max(...yPaymentLastMonth);
            document.getElementById('minPayment').innerHTML = Math.min(...yPaymentLastMonth);
            chartPaymentLastMonth();

            /**
             * Chart Total Order
             */
            const xTotalOrder = <?php echo json_encode($orderDate); ?>;
            const yTotalOrder = <?php echo json_encode($totalOrder); ?>;
            // console.log(yTotalOrder);
            chartTotalOrder();

            /**
             * Chart Acummalated payment since join foody
             */
            const xAccumPay = <?php echo json_encode($year); ?>;
            const yAccumPay = <?php echo json_encode($accumPay); ?>;
            // console.log(xAccumPay, yAccumPay);
            chartAccumPay();

            /**
             * Chart payment last month
             */
            function chartPaymentLastMonth() {
                new Chart("chartPaymentLastMonth", {
                    type: "bar",
                    data: {
                        labels: xPaymentLastMonth,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yPaymentLastMonth
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false,
                            text: "Collected Payment Last Month"
                        }
                    }
                });
            }

            /**
             * Chart Total Order
             */
            function chartTotalOrder() {
                new Chart("chartTotalOrder", {
                    type: "line",
                    data: {
                        labels: xTotalOrder,
                        datasets: [{
                            backgroundColor: '#5C4F712A',
                            borderColor: barColors,
                            data: yTotalOrder
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false,
                            text: "Number Of Orders Last Month"
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
            /**
             * Chart Acummalated payment since join foody
             */
            function chartAccumPay() {
                new Chart("chartAccumPay", {
                    type: 'bar',
                    data: {
                        labels: xAccumPay,
                        datasets: [{
                            data: yAccumPay.reduce((pre, cur) => (pre + cur)),
                            backgroundColor: barColors
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        }
    </script>
</head>

<body onload="init()">
    <header>
        <?php include 'assets/reusable/header.php'; ?>
    </header>

    <!-- content -->
    <div id="content-wrapper">
        <?php include 'assets/reusable/navbar.php'; ?>

        <!-- main content (right side) -->
        <div id="main-content">

            <!-- 
            Last payment (lowest and highest)
         -->
            <div class="white-card">
                <h3 style="margin-bottom: 2.5rem;">Accumalated Received Payment Since Joined Foody</h3>
                <canvas id="chartPaymentLastMonth" style="width:100%;max-width:700px"></canvas>

                <div style="width: 100%; display: flex; flex-direction: column; justify-content: start;">
                    <p style="margin-top: 1rem;">Highest : RM <span id="maxPayment"></span></p>
                    <p style="margin-top: 0.25em;">Lowest : RM <span id="minPayment"></span></p>
                </div>
            </div>

            <!-- 
                Total order
             -->
            <div class="white-card">
                <h3 style="margin-bottom: 2.5rem;">Accumalated Received Payment Since Joined Foody</h3>
                <canvas id="chartTotalOrder" style="width:100%;max-width:700px"></canvas>
            </div>

            <!-- 
                Accumulated payment
             -->
            <div class="white-card">
                <h3 style="margin-bottom: 2.5rem;">Accumalated Received Payment Since Joined Foody</h3>
                <canvas id="chartAccumPay" style="width:100%;max-width:700px"></canvas>
            </div>

        </div>
    </div>
</body>

</html>