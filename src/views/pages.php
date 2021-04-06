<?php

include_once "bootstrap.php";

$pages = $entityManager->getRepository("Page")->findAll();

print('<nav class="navigation">');
foreach ($pages as $page) {
   
    }
