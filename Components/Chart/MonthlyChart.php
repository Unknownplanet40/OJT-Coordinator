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
                    // example: data: <php echo json_encode($data); >,
                    // mag isip kayo kung pano nyo ilalagay sa data yung data from php
                    // pwede rin kayo gumamit ng loop para sa data

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