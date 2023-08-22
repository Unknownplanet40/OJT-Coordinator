
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- sweetalert script -->
    <script src="../Script/SweetAlert2.js"></script>
    <title>sweetalert</title>
</head>

<body>
    <p class="text-center">
        open using js <button type="submit" id="openSA">open SA</button>
    </p>
    <script>
        document.getElementById('openSA').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                // showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    // go to another page if confirmed
                    //window.location.href = "";
                }
            })
        })
    </script>
</body>

</html>