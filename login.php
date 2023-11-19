<?php require ("loginLog.php")?>

<?php 
 if(isset($_POST['submit']))
  {
    $user = new LoginUser($_POST['username'], $_POST['password']);
  }

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign.css">
    <title>Login Form</title>
</head>
<body>
    <div class="Interface">
    <h1 class="Title">Login</h1>
        <div class="Inner-Block">
        <form action="Login.php" method="post">
                <label for="username">Username:</label>
                <br>
                <input type="text" class="Username" name="username" required>
                <br>
                <label  for="password">Password:</label>
                <br>
                <input type="password" id="password" name="password" required>
                <br>
                <div class="Container">    
                    <input type="checkbox" id="showPassword">
                    <h3>Show Password</h3>
                </div>
                <button  id="submit" type="submit" name="submit">Log in</button>
                <h1>Don't have an account?</h3>
                <a href="SignUp.php"><h1 style="color: gray;">SignUp</h1></a>
            </form>
        </div>
</div>

    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
</body>
</html>
