<?php
use Doctrine\ORM\EntityManager;

include_once "bootstrap.php";
if (!$entityManager) return; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="./style.css"> -->

    <title>Pages</title>
</head>
    <body>
      <div class="container">
            <header>
                <h2 class="row justify-content-md-center">Content Management System</h2>
            </header>


            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e6ffe6; font-size: 18px;">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#" style="color:black;">About</a>
                <a class="nav-link" href="#" style="color:black">News</a>
            </nav>

            <h5>HOME</h5>
            <p>This is CMS home page.</p>

            <footer class="footer" style="background-color: #e6ffe6; padding:3px;">
                <p>&copy; Copyrights 2021</p>
            </footer>
        </div>
    </body>
</html>
