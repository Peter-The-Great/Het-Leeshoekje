<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/a900db2b0a40910b1f584fbed5e438e8?family=Caecilia+LT+Std" rel="stylesheet"
        type="text/css" /> -->
    <title>Basisschool Zeebos - Leesomgeving</title>
</head>
<body>
    <header>
        <h2 class="pt-5">Digitale Leesomgeving</h2>
        <p>Basisschool Zeebos</p>
        <nav class="nav justify-content-center navbar navbar-expand-lg navbar-dark" id="nav">
            <a class="nav-link btn btn-success btn-lg grow" href="#">📚 Boeken</a>
            <a class="nav-link btn btn-success btn-lg grow" href="#">🎁 Beloningen</a>
        </nav>
    </header>
    <div class="container mt-4">
        <div class="row" id="bookcase">
            <!-- Begin loop -->
            <?php
            $array = file_get_contents("./json/boeken.jsonc");
            $phparray = json_decode($array, true);
            $phparray = (array)$phparray;
            foreach ($phparray as $main) {
               ?> 
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-3">
                        <a href="read.php?boek=<?php echo $main["url"];?>&titel=<?php echo $main["type"];?>&subtitel=<?php echo $main["boek"];?>" class="text-dark text-decoration-none">
                            <div class="card book-grow h-100">
                                <img class="card-img-top" src="<?php echo $main["image"];?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $main["type"];?></h5>
                                    <p class="m-0"><?php echo $main["boek"];?></p>
                                </div>
                            </div>
                        </a>
                    </div>
               <?php
            }
            ?>
        </div>
    </div>
    <script src="js/sticky.js"></script>
    <script src="https://kit.fontawesome.com/5e648759f0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
