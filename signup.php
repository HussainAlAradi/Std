<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Register</title>

    <style>
      html,
      body {
        height: 100%;
      }

      body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: auto;
      }

      .form-label-group {
        position: relative;
        margin-bottom: 1rem;
      }

      .form-label-group input,
      .form-label-group label {
        height: 2.75rem;
        padding: .75rem;
      }

      .form-label-group label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0; /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        pointer-events: none;
        cursor: text; /* Match the input under the label */
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
      }

      .form-label-group input::-webkit-input-placeholder {
        color: transparent;
      }

      .form-label-group input::-moz-placeholder {
        color: transparent;
      }

      .form-label-group input:-ms-input-placeholder {
        color: transparent;
      }

      .form-label-group input::-ms-input-placeholder {
        color: transparent;
      }

      .form-label-group input::placeholder {
        color: transparent;
      }

      .form-label-group input:not(:-moz-placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
      }

      .form-label-group input:not(:-ms-input-placeholder) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
      }

      .form-label-group input:not(:placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
      }

      .form-label-group input:not(:-moz-placeholder-shown) ~ label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
      }

      .form-label-group input:not(:-ms-input-placeholder) ~ label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
      }

      .form-label-group input:not(:placeholder-shown) ~ label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
      }

      .form-label-group input:-webkit-autofill ~ label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
      }

      /* Fallback for Edge
      -------------------------------------------------- */
      @supports (-ms-ime-align: auto) {
        .form-label-group {
          display: -ms-flexbox;
          display: flex;
          -ms-flex-direction: column-reverse;
          flex-direction: column-reverse;
        }

        .form-label-group label {
          position: static;
        }

        .form-label-group input::-ms-input-placeholder {
          color: #777;
        }
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="proc/style.css">

</head>
<body  class="text-center" style="background-color: #f5f5f5;">

    <div class="container" style='width:35%;'>
      <form action="proc/signup-proc.php" method="POST">
        <img class="mb-4 rounded-lg" src="proc/images/logo2.png" alt="" width="70" height="70">
        <h1 class="h3 mb-4 font-weight-normal">Please sign up</h1>
        <?php
            //input validation

            if(isset($_GET['error'])){
                if($_GET['error'] == "empty"){
                    echo "<p>Fill all fields!</p>";
                }
                elseif($_GET['error'] == "invalidCharUser"){
                    echo "<p>Enter a valid username!</p>";
                }
                elseif($_GET['error'] == "invalidCharEmail"){
                    echo "<p>Enter a valid E-Mail!</p>";
                }
                elseif($_GET['error'] == "pwdSmall"){
                    echo "<p>Password must contain atleast 8 characters!</p>";
                }
                elseif($_GET['error'] == "wrongNumber"){
                    echo "<p>phoen number should be exactly 8 digits!</p>";
                }
                elseif($_GET['error'] == "pwdMatch"){
                    echo "<p>Password do not match!</p>";
                }
                elseif($_GET['error'] == "userExist"){
                    echo "<p>Username already exist!</p>";
                }
                elseif($_GET['error'] == "stmtFailed"){
                    echo "<p>An error occurred!</p>";
                }
            }
        ?>
        <div class="form-label-group text-left">
          <input type="text" name="username" id="inputuname" class="form-control mb-2" placeholder="username" required autofocus>
          <label for="inputuname" >Username</label>
        </div>


        <div class="form-label-group text-left">
          <input type="text" name="email" id="inputemail" class="form-control mb-2" placeholder="email" required autofocus>
          <label for="inputemail" >Email</label>
        </div>


        <div class="form-label-group text-left">
          <input type="text" name="phone" id="inputphone" class="form-control mb-2" placeholder="phone number" required autofocus>
          <label for="inputphone" >Phone</label>
        </div>


        <div class="form-label-group text-left">
          <input type="password" name="pwd" id="inputPassword" class="form-control mb-2" placeholder="password" required autofocus>
          <label for="inputPassword">Password</label>
        </div>


        <div class="form-label-group text-left">
          <input type="password" name="pwdrepeat" id="irepeatpass" class="form-control" placeholder="repeat password"required autofocus>
          <label for="irepeatpass">Repeat Password</label>
        </div>
        <hr>
        <button type="submit" class="btn btn-lg btn-primary btn-block mt-4" name="submit">Sign up</button>
        <br>
        Already have an account? <a href="login.php" class="text-decoration-none">Log in</a>
      </form>
    </div>

</body>
</html>
