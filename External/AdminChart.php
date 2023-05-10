<canvas id="chartjs_bar"></canvas>
<script>
        var ctx = document.getElementById("chartjs_bar").getContext("2d");
        var myChart = new Chart(ctx, {
            // list all type of chart here
            // bar, line, pie, doughnut, radar, polarArea, bubble, scatter
            type: "bar",
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"], // add php label here
                datasets: [
                    {
                        backgroundColor: [
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                            "#FFA31A",
                        ],
                        data: [87, 42, 15, 69, 33, 58, 91, 24, 76, 51, 9, 95],  //add php data here
                        // to get data from php use this "json_encode($data)"
                    },
                ],
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Monthly Trainee Attendance",
                    fontSize: 18,
                    fontColor: "#fff",
                    fontFamily: "poppins",
                },
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [
                        {
                            gridLines: {
                                color: "rgba(255,255,255,0.1)",
                            },
                            ticks: {
                                fontColor: "#fff",
                                fontSize: 14,
                                beginAtZero: true,
                            },
                        },
                    ],
                    xAxes: [
                        {
                            gridLines: {
                                color: "rgba(255,255,255,0.1)",
                            },
                            ticks: {
                                fontColor: "#fff",
                                fontSize: 12,
                                beginAtZero: true,
                            },
                        },
                    ],
                },
            },
        });
    </script>