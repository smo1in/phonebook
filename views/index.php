<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Phone book</title>
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
</head>

<body>
  <div class="page-wrapper">
    <nav>
      <div class="nav-wrapper  ">
        <a href="#!" class="brand-logo center">Phone book</a>
      </div>
    </nav>
    <div class="card">
      <div class="card-tabs">
        <ul class="tabs tabs-fixed-width container">
          <li class="tab"><a href="#users">Public Phonebook</a></li>
          <li class="tab"><a class="active" href="#signup-form">Login</a></li>
        </ul>
      </div>
      <div class="container">
        <div class="card-content">
          <?php include ROOT . '/views/publicPhonebook.php'; ?>
          <div class='container' id="signup-form">
            <form action="/contact/login" method="POST">
              <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="userName" class="validate">
                <label for="icon_prefix">User Name</label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">lock</i>
                <input type="password" name="password" class="validate">
                <label for="icon_lock">Password</label>
              </div>
                 <br/><br/>
                    <div class="waves-effect waves-light teal btn">
                      <input type="submit" name="submit" value="LOGIN" />
                    </div>
                 <br/><br/>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>