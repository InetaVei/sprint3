<?php

require_once "bootstrap.php";

session_start();
if (isset($_POST['logout'])) {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged_in']);
    header('Location: http://localhost/sprint3');
    exit;
}

if (isset($_POST['login'])
    && !empty($_POST['username'])
    && !empty($_POST['password'])
    ) {
    if ($_POST['username'] == 'admin'
        && $_POST['password'] == '123'
    ) {
        $_SESSION['logged_in'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'admin';
    } else {
        print ('<div class="alert alert-danger" role="alert">Wrong username or password</div>');
      }
    }

if ($_SESSION['logged_in'] == true) {

    if (isset($_POST['edit'])) {
        $page = $entityManager->find('Page', $_POST['edit']);
        getAdminNav();
        print('<p class="actionsName">Edit pages</p>');
        print('<form class="actions adding" action="" method="POST">
                <input type="hidden" name="updateId" value="' . $page->getId() . '">
                <label for="name">Title</label><br>
                <input type="text" name="title" value="' . $page->getName() . '"><br>
                <label for="content">Content</label><br>
                <textarea id="content" name="content">' . $page->getContent() . '</textarea><br>
                <button class="btn btn-default" type="submit" name="update">Submit</button>
                <button class="btn btn-default" type="submit" name="cancel">Cancel</button>
                </form>');

    } elseif (isset($_POST['addNewPage'])) {
        getAdminNav();
        print('<p class="actionsName">Add new page</p>');
        print('<form class="actions adding" action="" method="POST">
                <label for="title">Title</label><br>
                <input type="hidden" name="title" value="title">
                <input type="text" id="title" name="title"><br>
                <label for="content">Content</label><br>
                <textarea id="content" name="content"></textarea><br>
                <button class="btn btn-default" type="submit" name="newPage">Submit</button>
                <button class="btn btn-default" type="submit" name="cancel">Cancel</button>
            </form>');
    } else {
        getAdminNav();
            print('<p class="actionsName">Manage Pages</p>');

        getTable($entityManager);
            print('<form class="actions addPage" action="" method="POST">
                    <button class="btn btn-default" type="submit" name="addNewPage">Add new page</button>
            </form>');
    }

    if (isset($_POST['update'])) {
        $page = $entityManager->find('Page', $_POST['updateId']);
        $title = $_POST['title'];
        $content = $_POST['content'];
        $page->setName($title);
        $page->setContent($content);
        $entityManager->flush();
        crntDir();
    }

    if (isset($_POST['delete'])) {
        $page = $entityManager->find('Page', $_POST['delete']);
        $entityManager->remove($page);
        $entityManager->flush();
        crntDir();
    }

    if (isset($_POST['newPage'])
        && !empty($_POST['title'])
        && !empty($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $page = new Page();
            $page->setName($title);
            $page->setContent($content);
            $entityManager->persist($page);
            $entityManager->flush();
            crntDir();
    }

    if (isset($_POST['cancel'])) {
        crntDir();
    }
} else { 
    print('<form class="loginForm" action="./admin.php" method="post">
            <input class="form-control" type="text" name="username" placeholder="admin" required autofocus></br>
            <input class="form-control" type="password" name="password" placeholder="123" required><br>
            <button type="submit" name="login" class="btn btn-default">Log In</button>
        </form>');
}

function crntDir()
{ header('Location: http://localhost/sprint3/admin'); }

function getAdminNav()
{
    print('<nav class="navigation">
            <div class="nav"><a href="./admin">Admin</a></div>
            <div class="nav"><a href="./">View Website</a></div>
            <div class="nav"><form class="logout" action="" method="post">
            <button class="logoutButton" type="submit" name="logout">Logout</button>
            </form></div>
        </nav>');
}

function getTable($entityManager)
{
    $pages = $entityManager->getRepository("Page")->findAll();
    print('<table class="table table-bordered">
            <thead class="head"><tr><th>Title</th><th>Actions</th><tr><thead>');
    foreach ($pages as $page) {
        print('<tr>');
        if ($page->getName() == "Home") {
            print('<td>' . $page->getName() . '</td>
                    <td><form class="actions" action="" method="POST">
                    <button class="btn btn-default" type="submit" name="edit" value="' . $page->getId() . '">Edit</button>
                </form></td>');
        } else {
            print('<td>' . $page->getName() . '</td>');
            print('<td><form class="actions" action="" method="POST">
                    <button class="btn btn-default" type="submit" name="edit" value="' . $page->getId() . '">Edit</button>
                    <button class="btn btn-default" type="submit" name="delete" value="' . $page->getId() . '">Delete</button>
                </form></td></tr>');
        }
    }
    print('</table>');
}
    