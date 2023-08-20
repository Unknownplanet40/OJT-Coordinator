<!-- Monthly Chart -->
<!-- kapag wlang comment wag gagalawin para iwas error -->

<script>
    var mon = document.getElementById("Monthly").getContext("2d");
    var month = new Chart(mon, {
        // list all type of chart here
        // bar, line, pie, doughnut, radar, polarArea, bubble, scatter
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                "Oct", "Nov", "Dec"], // add php label here or pwede wag na baguhin parehas lang naman
            datasets: [
                {
                    backgroundColor: [
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                        "#844cf7",
                    ],
                    data: [
                        <?php echo json_encode(MonthlyChart(1)); ?>,
                        <?php echo json_encode(MonthlyChart(2)); ?>,
                        <?php echo json_encode(MonthlyChart(3)); ?>,
                        <?php echo json_encode(MonthlyChart(4)); ?>,
                        <?php echo json_encode(MonthlyChart(5)); ?>,
                        <?php echo json_encode(MonthlyChart(6)); ?>,
                        <?php echo json_encode(MonthlyChart(7)); ?>,
                        <?php echo json_encode(MonthlyChart(8)); ?>,
                        <?php echo json_encode(MonthlyChart(9)); ?>,
                        <?php echo json_encode(MonthlyChart(10)); ?>,
                        <?php echo json_encode(MonthlyChart(11)); ?>,
                        <?php echo json_encode(MonthlyChart(12)); ?>,
                    ],
                    
                    //add php data here
                    // to get data from php use this "json_encode($data)"
                    // example: data: <php echo json_encode($data); >,

                },
            ],
        },
        // yung code para sa settings ng chart gaya ng color, title, etc.
        options: {
            //responsive: true,
            aspectRatio: 3.5,
            title: {
                display: false,
                position: "top",
                text: "Monthly Registered Trainee's",
                fontSize: 16,
                fontColor: "#000",
                fontFamily: "poppins",
            },
            legend: {
                display: false,
            },
            scales: {
                yAxes: [
                    {
                        gridLines: {
                            color: "rgba(0,0,0,0.1)",
                        },
                        ticks: {
                            fontColor: "#000",
                            fontSize: 14,
                            beginAtZero: true,
                            fontFamily: "poppins",
                            fontStyle: "bold",
                        },
                    },
                ],
                xAxes: [
                    {
                        gridLines: {
                            color: "rgba(0,0,0,0.1)",
                        },
                        ticks: {
                            fontColor: "#000",
                            fontSize: 12,
                            fontFamily: "poppins",
                            beginAtZero: true,
                            fontStyle: "bold",
                        },
                    },
                ],
            },
        },
    });
</script>