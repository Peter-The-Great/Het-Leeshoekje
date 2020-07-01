<?php
error_reporting(0);
if(!empty($_GET["boek"]) && !empty($_GET["titel"]) && !empty($_GET["subtitel"])) {
    $boek = $_GET["boek"];
    $titel = $_GET["titel"];
    $subtitel = $_GET["subtitel"];

    if($array = file_get_contents("./json/$boek.jsonc")) {
        $phparray = json_decode($array, true);
        $phparray = (array)$phparray;
        //var_dump($phparray);
    } else {
        include("fout.php");
        return false;
    } 
} else {
    include("fout.php");
    return false;
}
?>
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
    <title>Basisschool Zeebos - <?php echo $titel; echo " "; echo $subtitel;?></title>
</head>
<body>
    <header>
        <h2 class="pt-5"><?php echo $titel;?></h2>
        <p><?php echo $subtitel;?></p>
        <nav class="nav justify-content-center navbar navbar-expand-lg navbar-dark" id="nav">
            <a class="nav-link btn btn-success btn-lg grow" href="index.php">📚 Terug naar boeken</a>
        </nav>
    </header>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-8">
                <div class="card card-body">
                    <?php
                    if(empty($_GET["pagina"])) { //als hij leeg is - als hij kleiner dan 0 is
                        $_GET["pagina"] = 0;
                    } else if($_GET["pagina"] < 0) {                        
                        $_GET["pagina"] = 0;
                    }
                    $page = $_GET["pagina"];
                    ?>
                    <p><?php echo $phparray[$page]["tekst"];?><p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body p-2">
                        <div class="container voice-buttons">
                           <div class="row">
                                <button class="btn btn-primary btn-lg col m-1" onclick='responsiveVoice.speak("<?php echo $phparray[$page]["luister"];?>", "Dutch Male");' type="button" value="Play">🔊</button>
                                <button onclick="responsiveVoice.cancel();" type="button" class="btn btn-danger btn-lg col m-1" value="Stop">🔈</button>
                                <button onclick="responsiveVoice.pause();" type="button" class="btn btn-warning text-white btn-lg col m-1" value="Pause"><i class="fas fa-pause"></i></button>
                                <button onclick="responsiveVoice.resume();" type="button" class="btn btn-success btn-lg col m-1" value="Resume"><i class="fas fa-play"></i></button>
                            </div>
                            <div class="row">
                                <?php if ($page > 0) { //Minder dan 0?>
                                <a href="read.php?boek=<?php echo $_GET['boek']?>&titel=<?php echo $titel;?>&subtitel=<?php echo $subtitel;?>&pagina=<?php echo ($page - 1);?>"class="btn btn-info btn-lg col m-1"> <i class="fas fa-caret-left fa-2x"></i></a> 
                                <?php } else { //Meer dan 0?><a class="btn btn-dark btn-lg col m-1 disabled"> <i class="fas fa-caret-left fa-2x"></i></a><?php } ?>
                                <?php if ($page < (count($phparray)-1)){ //?>
                                <a href="read.php?boek=<?php echo $_GET['boek']?>&titel=<?php echo $titel;?>&subtitel=<?php echo $subtitel;?>&pagina=<?php echo ($page + 1);?>"class="btn btn-info btn-lg col m-1"> <i class="fas fa-caret-right fa-2x"></i></a><?php } else{ ?>
                                <a href="index.php" class="btn btn-light btn-lg col m-1"> <i class="fas fa-check fa-2x"></i></a><?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php $pagedisplay = $page + 1; $pagedisplaymax = count($phparray); echo "Pagina <b>".$pagedisplay."</b>/<b>".$pagedisplaymax."</b>"?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.responsivevoice.org/responsivevoice.js?key=wt3GpOlW"></script>
<script src="js/sticky.js"></script>
<script src="js/page.js"></script>
<script src="https://kit.fontawesome.com/5e648759f0.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>