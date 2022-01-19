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

        if(trim($line) != '') {
            $f2[] = $line;
        }
    }

    fclose($textFile2);

    function console($value) {
        echo '<script> console.log(`' . $value . '`); </script>';
    }

    function printRow($key, $line, $type = null, $icon = null) {

        echo '<div class="number">
        <span class="text-' . $type . '">' . ++$key . '</div>
        <div class="text text-' . $type . '"> ' . $line . '
        <span> <i class="fas fa-' . $icon . '"></i> </span></div></span>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Differences between two files</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    echo '<div class="number">' . ++$key . '</div><div class="text">' . $line . '</div>';
                } ?>
                </div>
            </div>
            
            <!-- Container second file -->
            <div id="container_second_file" class="d-block">
                <div class="preview">

                <?php $jump = 0; foreach ($f2 as $key => $line) {

                    if (isset($f2[$key]) == isset($f1[$key]) && $f2[$key] === $f1[$key]) {
                        console('Uguali');
                        printRow($key, $line); continue;
                    }

                    if (!isset($f1[$key - $jump])) {
                        console('Aggiunto');
                        printRow($key, $line, 'success', 'plus'); continue;
                    }

                    if ($f2[$key - $jump] != $f1[$key - $jump]) {
                        similar_text($f2[$key - $jump], $f1[$key - $jump], $percent);
                        console('Simili ' . (int)$percent); 
                        if ($percent > 50) {
                            printRow($key, $line, 'warning', 'pencil');
                            continue;
                        }
                        $found = false;
                        for ($j = $key - $jump; $j < count($f1); $j++) {
                            console('File 2: ' . $f2[$key]);
                            console('File 1: ' . $f1[$j]);
                            console('- - - - - -');
                            if ($f2[$key] == $f1[$j]) {
                                console('# # # # #');
                                $found = true; break;
                            }
                        }
                    
                        if ($found) {
                            console('Esiste');
                            printRow($key, $line);
                        } else {
                            $jump++;
                            console('Non o trova per cui è nuovo');
                            printRow($key, $line, 'success', 'plus');
                        }
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