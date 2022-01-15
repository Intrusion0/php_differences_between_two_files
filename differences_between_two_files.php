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

    <?php
        include "custom-error-handler.php";
    ?>

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
            <h2>Insert two files and check their differences</h2>

            <!-- Container first file -->
            <div id="container_first_file">
                <form method="post" enctype="multipart/form-data">
                    <div class="ms-input-group input-group">
                        <input type="file" class="form-control" id="first_file" name="first_file" aria-label="Upload">
                        <button class="btn btn-outline-secondary" type="submit" id="btn_first_file">View information file</button>
                    </div>
                </form>

                <?php
                    // Test to see if it works.
                    if (isset($_FILES['first_file']) != null) {
                        echo 'file name:' . ' ' . $_FILES['first_file']['name'] . '<br>';
                        echo 'file type:' . ' ' . $_FILES['first_file']['type'] . '<br>';
                    }
                ?>

            </div>

            <!-- Container second file -->
            <div id="container_second_file">
                <form method="post" enctype="multipart/form-data">
                    <div class="ms-input-group input-group">
                        <input type="file" class="form-control" id="second_file" name="second_file" aria-label="Upload">
                        <button class="btn btn-outline-secondary" type="submit" id="btn_second_file">View information file</button>
                    </div>
                </form>
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