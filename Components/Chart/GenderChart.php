<script>
    var gender = document.getElementById("gender").getContext("2d");
    let male = "Male: " + <?php echo json_encode($maleFormatted); ?>;
    let female = "Female: " + <?php echo json_encode($femaleFormatted); ?>;
    var myChart = new Chart(gender, {
        // list all type of chart here
        // bar, line, pie, doughnut, radar, polarArea, bubble, scatter
        type: "pie", //gender pie chart
        data: {
            

            labels: [male,female], //add php data here
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
                fontColor: "#00",
                fontFamily: "poppins",
            },
            legend: {
                display: true,
                position: "right",
                labels: {
                    fontColor: "#000",
                    fontFamily: "poppins",
                    fontSize: 16,
                    fontStyle: "bold",
                },
                onClick: function (e) {
                    e.stopPropagation();
                },
            },
            elements: {
                arc: {
                    borderColor: "#000",
                    borderWidth: 1,
                },
            },
            // remove hover effect
            hover: { mode: null },
            tooltips: { enabled: false },

        },
    });
</script>