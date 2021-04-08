<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Sprint3</title>
</head>

<body>
    <div class="container">
        <h2 class="header">Content Management System</h2>
        <?php
        function startsWith($string, $startString)
        {
            $len = strlen($startString);
            return (substr($string, 0, $len) === $startString);
        }

        $url = $_SERVER['REQUEST_URI'];
        $root = '/sprint3/';
        print("<br>");

        if (startsWith($url, $root . 'admin')) {
            require __DIR__ . '/src/views/admin.php';
        } elseif (startsWith($url, $root)) {
            require __DIR__ . '/src/views/pages.php';
        } else {
            http_response_code(404);
            print('<p>Error: Page Not Found</p>');
        }

        ?>
        <footer class="footer">
            <p class="footerText">&copy; Copyrights 2021, CMS application</p>
        </footer>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>