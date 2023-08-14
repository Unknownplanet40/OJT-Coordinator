<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/SweetAlert2.css">
    <script src="../Script/SweetAlert2.js"></script>
    <title>Document</title>
</head>
<body>
    <!-- Example 1 -->
    <script>
        Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
    </script>
    <!-- Example 2-->
    <button onclick="Swal.fire('Hello world!')">Click me Example 2</button>
    <!-- Example 3-->
    <button onclick="myFunction()">Click me Example 3</button>
    <script>
        function myFunction() {
            Swal.fire({
                title: 'Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool'
            })
        }
    </script>
    <!-- Example 4-->
    <button onclick="myFunction2()">Click me Example 4</button>
    <script>
        function myFunction2() {
            Swal.fire({
                title: 'Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Saved!',
                        'Your file has been saved.',
                        'success'
                    )
                }
            })
        }
    </script>
    <!-- Example 5-->
    <button onclick="myFunction3()">Click me Example 5</button>
    <script>
        function myFunction3() {
            Swal.fire({
                title: 'Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Saved!',
                        'Your file has been saved.',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Saved!',
                                'Your file has been saved.',
                                'success'
                            )
                        }
                    })
                }
            })
        }
    </script>
    <!-- Example 6-->
    <?php
        if(isset($_POST['submit'])){
            echo '<script>
            function myFunction4() {
                Swal.fire({
                    title: "Error!",
                    text: "Do you want to continue",
                    icon: "error",
                    confirmButtonText: "Cool"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Saved!",
                            "Your file has been saved.",
                            "success"
                        ).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire(
                                    "Saved!",
                                    "Your file has been saved.",
                                    "success"
                                )
                            }
                        })
                    }
                })
            }
        </script>';
        }
    ?>
    <form action="" method="post" onsubmit="myFunction4()">
        <input type="submit" value="Submit">
    </form>
</body>
</html>