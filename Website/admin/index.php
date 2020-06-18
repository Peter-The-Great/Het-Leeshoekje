<?php

session_start();
if(isset($_SESSION["loggedin"])) {
    header("Location: dashboard.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/618095047711391757/713383608932368434/default.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
    <title>De Colomnist Admin - Login</title>
</head>

<body>
    <main class="container">
        <div class="login-box mx-auto shadow p-3 mb-5 bg-white rounded">
            <!-- Shadow, Center in the middle of screen -->
            <!-- Logo-->
            <center><img src="../images/logo.png"></center>
            <h4 class="card-title mb-4 mt-1">Inloggen</h4>
            <!-- Forum Itself -->
            <form method="POST" action="../php/login/authenticate.php">
                <div class="form-group">
                    <label>Gebruikersnaam</label>
                    <input name="username" id="username" class="form-control" placeholder="Gebruikersnaam" type="username">
                </div>
                <div class="form-group">
                    <label>Wachtwoord</label>
                    <input name="password" id="password" class="form-control" placeholder="******" type="password">
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" class="btn btn-dark btn-block" name="Inloggen">Inloggen</button>
                </div>
                <?php
                      if(isset($_GET['error'])) {
                        if ($_GET['error'] == "password") {
                            echo "<p style='color: red;'>That account does not exist or the password you provided was incorrect.</p>";
                        }
                        else if ($_GET['error'] == "captcha") {
                            echo "<p style='color: red;'>Google could not verrify that you where a human.</p>";
                        }
                        else {
                            echo "<p style='color: red;'>There was a connection issue between you and our servers.</p>";
                        }
                    }
                ?>
            </form>
            <a href="../index.php">← Terug naar homepage.</a>
        </div>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/24c24daece.js"></script>
</body>

</html>