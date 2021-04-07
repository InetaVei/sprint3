<?php require_once "bootstrap.php";

    session_start();
    // logout logic
    if(isset($_GET['action']) and $_GET['action'] == 'logout'){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['logged_in']);
    }
?>
<!doctype html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./style.css">

      <title>admin-page</title>
    </head>
  <body>

    <?php
      $msg = '';
      if (isset($_POST['login']) 
          && !empty($_POST['username']) 
          && !empty($_POST['password'])
      ) { 
          if ($_POST['username'] == 'admin' && 
            $_POST['password'] == '123'
          ) {
            $_SESSION['logged_in'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'admin';
          } else {
            $msg = '<div class="alert alert-danger" role="alert">Wrong username or password</div>';
          }
      }
    ?>     

  <?php if($_SESSION['logged_in'] != true): ?>   

      <div class="container">
        <div class="row align-items-center">
          <div class="col">
                <header>
                  <h2 class="text-center">Content Management System</h2>
                </header>

              <?php echo $msg; ?>
            
              <form action="./admin.php" method="post">
                    <div class="col-3 mb-2 ">
                  <input type="text" name="username" class="form-control" placeholder="admin" required autofocus>
                    </div>
                    <div class="col-3 mb-2 ">
                  <input type="password" name="password" class="form-control" placeholder="123" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary" style="background-color: #e6ffe6; color: black;">Login</button>
                </form>
            </div>
          </div>
        </div>
     

  <?php endif; ?>
  



  <?php if($_SESSION['logged_in'] == true): ?>

    <div class="container">
      <div class="row align-items-center">
        <div class="col">
              <header>
                <h2 class="text-center">Content Management System</h2>
              </header>
    <?php
        print('<table class="table table-striped table-hover">');
        print('<thead style="background-color: #e6ffe6"> ');
        print('<tr><th>Title</th><th>Action</th><tr><tbody>');

        print ('<tr>
                <td>' . $row['name'] . '</td>
                <td>' . '<form action="'. $_SERVER['PHP_SELF'] .'" method="post" >
                        <div class="container-fluid">
                        <div class="row">
                        <div class="col-12">
                        <a href="" type="button" name="submit" class="btn btn-primary btn-sm" style="background-color: #e6ffe6; color:black; border-color:black">Edit</a>
                        <button type="submit" name="submit" class="btn btn-outline-primary btn-sm" value="'. $row['id'] .'" style="background-color: #e6ffe6; color:black; border-color:black">Delete</button></form>
                        ' .  '
                        </div>
                        </div>
                        </td></tr>'
                );            

        print('</tbody></table>');

       ?>
  </div>

      <div class="row">
        <div class="col">Click here to <a href = "admin.php?action=logout" class="btn btn-primary btn-sm" style="background-color: #e6ffe6; color: black;">logout</a></div>
      </div>

      <div class="col">
      <footer class="footer" style="background-color: #e6ffe6; padding:3px;">
            <p>&copy; Copyrights 2021</p>
      </footer>
      </div> 
      <?php endif; ?>
  </body>

</html>