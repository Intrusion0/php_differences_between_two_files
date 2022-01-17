<?php

    include "custom-error-handler.php";

    $textFile1 = fopen('test1.txt','r');

    $f1 = [];
    while ($line = fgets($textFile1)) {
        $f1[] = $line;
    }

    fclose($textFile1);

    
    $textFile2 = fopen('test2.txt','r');

    $f2 = [];
    while ($line = fgets($textFile2)) {
        $f2[] = $line;
    }

    fclose($textFile2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Differences between two files</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <!-- Header -->
    <header>
        <!-- Custom container -->
        <div class="ms-container">

        </div>
    </header>

    <!-- Main -->
    <main>    
        <!-- Custom container -->
        <div class="ms-container">
            <h2>Difference between two text files</h2>

            <!-- Container first file -->
            <div id="container_first_file">
                <div class="preview">
                <?php foreach ($f1 as $key => $line) {
                    echo '<div class="number">' . $key . '</div><div class="text">' . $line . '</div>';
                } ?>
                </div>
            </div>
            
            <!-- Container second file -->
            <div id="container_second_file" class="d-block">
                <div class="preview">
                <?php foreach ($f2 as $key => $line) {
                    if (isset($f2[$key]) == isset($f1[$key]) && $f2[$key] === $f1[$key]) {
                        echo '<div class="number">' . $key . '</div><div class="text">' . $line . '</div>';
                    } else if (isset($f2[$key]) != isset($f1[$key])) {
                        echo '<div class="number"><span class="text-success">' . $key . '</div><div class="text text-success"> ' . $line . '</div></span>';
                    } else {
                        echo '<div class="number"><span class="text-danger">' . $key . '</div><div class="text text-danger"> ' . $line . '</div></span>';
                    }
                } ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <!-- Custom container -->
        <div class="ms-container">
            <span>
                &copy; Copyright 2022 Mario Lombardo
            </span>
        </div>
    </footer>

</body>
</html>