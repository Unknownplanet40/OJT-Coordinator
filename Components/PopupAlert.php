<?php

function NewAlertBox()
{
    if (isset($_SESSION['message'])) {
        if ($_SESSION['Show']) {

            $title = "";

            switch ($_SESSION['icon']) {
                case 'success':
                    //$title = "Success";
                    $title = "";
                    break;
                case 'info':
                    //$title = "Information";
                    $title = "";
                    break;
                case 'question':
                    //$title = "Attention";
                    $title = "";
                    break;
                case 'warning':
                    //$title = "There\'s something wrong!";
                    $title = "";
                    break;
                case 'error':
                    //$title = "Oops... Something went wrong!";
                    $title = "";
                    break;
                default:
                    $title = "Oops... We\'re sorry! <hr>";
                    break;
            }
            # with timer
            /* return "<script>
            Swal.fire({
            icon: '". $_SESSION['icon'] ."',
            title: '". $title ."',
            text: '" . $_SESSION['message'] . "',
            showConfirmButton: false,
            timer: 2600
            });</script>"; */

            if (isset($_SESSION['SAtheme']) && $_SESSION['SAtheme'] == "light") {
                return '<script>
                Swal.fire({
                    icon: "' . $_SESSION['icon'] . '",
                    title: "' . $title . '",
                    text: "' . $_SESSION['message'] . '",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false
                  });</script>';
            } else {
                return '<script>
                Swal.fire({
                    icon: "' . $_SESSION['icon'] . '",
                    title: "' . $title . '",
                    text: "' . $_SESSION['message'] . '",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    background: "#fff",
                    color: "#000"
                  });</script>';
            }
        }
    } else {
        return "";
    }
}
?>