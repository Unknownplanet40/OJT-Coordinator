<script>
    var gender = document.getElementById("gender").getContext("2d");
    var myChart = new Chart(gender, {
        // list all type of chart here
        // bar, line, pie, doughnut, radar, polarArea, bubble, scatter
        type: "pie", //gender pie chart
        data: {
            labels: ["Male", "Female"], // add php label here
            datasets: [
                {
                    backgroundColor: [
                        "rgb(54, 162, 235)", //male color
                        "rgb(255, 99, 132)", //Female color
                    ],
                    //data: [87, 42],  //add php data here
                    // to get data from php use this "json_encode($data)"
                    // try ko hanapin yung pinagkunan ko ng code na to para mas maintindihan nyo
                    data: [
                        <?php echo json_encode(maleChart()); ?>, 
                        <?php echo json_encode(femaleChart()); ?>
                    ],
                },
            ],
        },
        options: {
            responsive: true,
            aspectRatio: 3.5,
            title: {
                display: false,
                position: "top",
                text: "Gender",
                fontSize: 18,
                fontColor: "#fff",
                fontFamily: "poppins",
            },
            legend: {
                display: true,
                position: "left",
                labels: {
                    fontColor: "#fff",
                    fontFamily: "poppins",
                    fontSize: 12,
                },
                onClick: function (e) {
                    e.stopPropagation();
                },
            },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
        },
    });
</script>