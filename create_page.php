<?php
    require_once "bootstrap.php";

    $newPageName = $argv[1];

    $page = new Page();
    $page->setName($newPageName);
    $page->setContent($newPageContent);

    $entityManager->persist($Page); // insert
    $entityManager->flush();  // uztvirtina veiksmus duomenu bazeje

    echo "Created Product with ID " . $page->getId() . "\n";