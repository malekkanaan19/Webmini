<?php require("registerClass.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $user = new RegisterUser($username, $_POST['password'], $_POST['dateOfBirth'], $_POST['gender'], $_POST['fullname']);
}
?>


<!DOCTYPE html>

<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <link rel="stylesheet" href="sign.css">
    </head>
    <body>
        <div class="Interface">
            <h1 class="Title">SignUp</h1>
                <div class="Inner-Block">
                    <form action ="" method = "post" >
                        <label for="username">Username:</label>
                        <br>
                        <input type="text" class="Username" name="username" required>
                        <br>
                        <label for="fullname">Fullname:</label>
                        <br>
                        <input type="text" class="Username" name="fullname" required>
                        <br>
                        <label  for="Password">Password:</label>
                        <br>
                        <input type="password" id="password" name="password" required>
                        <br>
                        <label for="gender">Choose your gender:</label><br>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male" class="radio-label">Male</label>
                      
                        <input type="radio" id="female" name="gender" value="female" required>
                        <label for="female" class="radio-label">Female</label>
                        <br>
                        <label for="DateOfBirth" >Place your date of birth</label required>
                        <br>
                        <input type="date" id="dateOfBirth" name="dateOfBirth" required style="margin-top: 15px; margin-left: 5px; font-family: POPPINS; border: 2px solid #000000">
                        <br>
                        <button  id="submit" type="submit" name="submit" style="margin-top: 15px;">SignUp</button>
                    </form>
                </div>

                <p><?php echo @$user-> error ?></p>
                <p><?php echo @$user-> success ?></p>


        </div>
    </body>
</html>
