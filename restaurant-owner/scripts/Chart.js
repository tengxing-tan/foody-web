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
