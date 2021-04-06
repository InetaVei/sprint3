<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">

    <title>Sprint3</title>

</head>
    <body>
             <?php
                function startsWith($string, $startString)
                {
                    $len = strlen($startString);
                    return (substr($string, 0, $len) === $startString);
                }

                $url = $_SERVER['REQUEST_URI'];
                $root = '/sprint3/';


                if (startsWith($url, $root . 'admin_page')) {
                    require __DIR__ . '/src/views/admin.php';
                } elseif (startsWith($url, $root)) {
                    require __DIR__ . '/src/views/pages.php';
                } else {
                    http_response_code(404);
                    print('<p>ERROR: Something went wrong.</p>');
                }
            ?>
        <div class="container">
            <h2 class="header">Content Management System</h2>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e6ffe6; font-size: 18px;">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#" style="color:black;">About</a>
                <a class="nav-link" href="#" style="color:black">News</a>
            </nav>

            <h5>HOME</h5>
            <p>This is CMS home page.</p>
        
            <footer class="footer">
                <p>&copy; Copyrights 2021, Mini CMS project</p>
            </footer>
        </div>
        </div>
    </body>

</html>