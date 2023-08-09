<?php
$servername = "localhost";
$username = "u657512357_testcolordb";
$password = "Eniyan@13";
$dbname = "u657512357_testcolordb";

// Function to update the color code in the database


function updateColorCodeInDB($colorCode, $conn) {
    $stmt = $conn->prepare("UPDATE colors SET color_code = :colorCode WHERE id = 1");
    $stmt->bindParam(':colorCode', $colorCode);
    $stmt->execute();
}

function updateColorCodeInDBminor($colorCodeminor, $conn) {
    $stmt = $conn->prepare("UPDATE orange SET color_code_o = :colorCodeminor WHERE id = 1");
    $stmt->bindParam(':colorCodeminor', $colorCodeminor);
    $stmt->execute();
}

function updateColorCodeInDBg($colorCodeg, $conn) {
    $stmt = $conn->prepare("UPDATE letterg SET color_code = :colorCodeg WHERE id = 1");
    $stmt->bindParam(':colorCodeg', $colorCodeg);
    $stmt->execute();
}


function updateColorCodeInDBe($colorCodee, $conn) {
    $stmt = $conn->prepare("UPDATE lettere SET color_code_e = :colorCodee WHERE id = 1");
    $stmt->bindParam(':colorCodee', $colorCodee);
    $stmt->execute();
}

function updateColorCodeInDBm($colorCodem, $conn) {
    $stmt = $conn->prepare("UPDATE letterm SET color_code_m = :colorCodem WHERE id = 1");
    $stmt->bindParam(':colorCodem', $colorCodem);
    $stmt->execute();
}

// Function to check user credentials against the database
function checkCredentials($username, $password, $conn) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count > 0;
}

$isAdminLoggedIn = false;

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($action === 'updateColorCode' && isset($_POST['colorCode'])) {
            $colorCode = $_POST['colorCode'];
            updateColorCodeInDB($colorCode, $conn);
            echo "<p class='text-success'>Color code updated successfully.</p>";
        }elseif ($action === 'updateColorCode2' && isset($_POST['colorCodeminor'])) {
            $colorCodeminor = $_POST['colorCodeminor'];
            updateColorCodeInDBminor($colorCodeminor, $conn);
            echo "<p class='text-success'>Color code updated successfully.</p>";
        }
        elseif ($action === 'updateColorCode3' && isset($_POST['colorCodeg'])) {
            $colorCodeg = $_POST['colorCodeg'];
            updateColorCodeInDBg($colorCodeg, $conn);
            echo "<p class='text-success'>Color code updated successfully.</p>";
        }
        elseif ($action === 'updateColorCode4' && isset($_POST['colorCodee'])) {
            $colorCodee = $_POST['colorCodee'];
            updateColorCodeInDBe($colorCodee, $conn);
            echo "<p class='text-success'>Color code updated successfully.</p>";
        } 
        elseif ($action === 'updateColorCode5' && isset($_POST['colorCodem'])) {
            $colorCodem = $_POST['colorCodem'];
            updateColorCodeInDBm($colorCodem, $conn);
            echo "<p class='text-success'>Color code updated successfully.</p>";
        } 
        elseif ($action === 'login' && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isAdminLoggedIn = checkCredentials($username, $password, $conn);
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .loginForm{
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            max-width: 960px;
            margin-right: auto;
            margin-left: auto;
        }
        .color-box {
            width: 100px;
            height: 100px;
            display: inline-block;
            cursor: pointer;
            border: 2px solid #fff;
            border-radius: 50%;
            margin: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease-in-out;
        }

        .color-box:hover {
            transform: scale(1.1);
        }

        h1 {
            margin-top: 50px;
        }
        .skyblue{
            background-color: skyblue;
        }
        .pink{
            background-color: pink;
        }
        .bg-orange {
            background-color: orange;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to update the color code in the database
            function updateColorCode(colorCode) {
                $.ajax({
                    url: 'admin.php',
                    type: 'POST',
                    data: { action: 'updateColorCode', colorCode: colorCode },
                    success: function(response) {
                        console.log('Color code updated successfully.');
                    },
                    error: function() {
                        console.log('Error occurred while updating color code.');
                    }
                });
            }

            // Color box click event
            var colorBoxes = document.getElementsByClassName('major-box');
            for (var i = 0; i < colorBoxes.length; i++) {
                colorBoxes[i].addEventListener('click', function() {
                    var colorCode = this.getAttribute('data-color-code');
                    updateColorCode(colorCode);
                });
            }



            function updateColorCode2(colorCodeminor) {
                $.ajax({
                    url: 'admin.php',
                    type: 'POST',
                    data: { action: 'updateColorCode2', colorCodeminor: colorCodeminor },
                    success: function(response) {
                        console.log('Color code updated successfully.');
                    },
                    error: function() {
                        console.log('Error occurred while updating color code.');
                    }
                });
            }

            // Color box click event
            var colorBoxes2 = document.getElementsByClassName('minor-box');
            for (var i = 0; i < colorBoxes2.length; i++) {
                colorBoxes2[i].addEventListener('click', function() {
                    var colorCodeminor = this.getAttribute('minor');
                    updateColorCode2(colorCodeminor);
                });
            }
            
            
            
            function updateColorCode3(colorCodeg) {
                $.ajax({
                    url: 'admin.php',
                    type: 'POST',
                    data: { action: 'updateColorCode3', colorCodeg: colorCodeg },
                    success: function(response) {
                        console.log('Color code updated successfully.');
                    },
                    error: function() {
                        console.log('Error occurred while updating color code.');
                    }
                });
            }

            // Color box click event
            var colorBoxes3 = document.getElementsByClassName('g-box');
            for (var i = 0; i < colorBoxes3.length; i++) {
                colorBoxes3[i].addEventListener('click', function() {
                    var colorCodeg = this.getAttribute('data-color-code-g');
                    //console.log(colorCodeg)
                    updateColorCode3(colorCodeg);
                });
            }


            function updateColorCode4(colorCodee) {
                $.ajax({
                    url: 'admin.php',
                    type: 'POST',
                    data: { action: 'updateColorCode4', colorCodee: colorCodee },
                    success: function(response) {
                        console.log('Color code updated successfully.');
                    },
                    error: function() {
                        console.log('Error occurred while updating color code.');
                    }
                });
            }

            // Color box click event
            var colorBoxes4 = document.getElementsByClassName('e-box');
            for (var i = 0; i < colorBoxes4.length; i++) {
                colorBoxes4[i].addEventListener('click', function() {
                    var colorCodee = this.getAttribute('data-color-code-e');
                    //console.log(colorCodeg)
                    updateColorCode4(colorCodee);
                });
            }
            
            
            function updateColorCode5(colorCodem) {
                $.ajax({
                    url: 'admin.php',
                    type: 'POST',
                    data: { action: 'updateColorCode5', colorCodem: colorCodem },
                    success: function(response) {
                        console.log('Color code updated successfully.');
                    },
                    error: function() {
                        console.log('Error occurred while updating color code.');
                    }
                });
            }

            // Color box click event
            var colorBoxes5 = document.getElementsByClassName('m-box');
            for (var i = 0; i < colorBoxes5.length; i++) {
                colorBoxes5[i].addEventListener('click', function() {
                    var colorCodem = this.getAttribute('data-color-code-m');
                    //console.log(colorCodem)
                    updateColorCode5(colorCodem);
                });
            }



        });
    </script>
</head>
<body>
    <?php if (! $isAdminLoggedIn ): ?>
    <div class="loginForm">
        <h1 class="text-center"> Login </h1>
        <form id="myForm" action="admin.php" method="POST">
            <div class="form-group">
                <label for="ID">Admin ID:</label>
                <input type="text" class="form-control" id="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" class="form-control" id="number" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="action" value="login">Submit</button>
        </form>
    </div>
    <?php endif; ?>

    <?php if ($isAdminLoggedIn): ?>
        <div class="container">
            <h1 class="text-center">C20 MILLION LIGHTS CONTROL PANNEL</h1>
            <div class="row row-cols-2">
                <div class="col">
                <div class="text-center">
                    <h3>Set 1 - Blue Arc</h3>
                    <div class="color-box major-box bg-dark" data-color-code="2"></div>
                    <div class="color-box major-box bg-primary" data-color-code="3"></div> <!-- Added orange color -->
                </div>
                </div>
                <div class="col">
                <div class="text-center">
                    <h3>Set 2 - Orange Arc</h3>
                    <div class="color-box minor-box bg-dark" minor="2"></div>
                    <div class="color-box minor-box bg-orange" minor="4"></div> <!-- Added orange color -->
                </div>
                </div>
                <div class="col">
                <div class="text-center">
                    <h3>Set 3 - 20 Arc</h3>
                    <div class="color-box e-box bg-dark" data-color-code-e="2"></div>
                    <div class="color-box e-box bg-primary" data-color-code-e="3"></div> <!-- Added orange color -->
                </div>
                </div>
                <div class="col">
                <div class="text-center">
                    <h3>Set 4 - Letter G</h3>
                    <div class="color-box g-box bg-dark" data-color-code-g="2"></div>
                    <div class="color-box g-box bg-orange" data-color-code-g="4"></div> <!-- Added orange color -->
                </div>
                </div>
                <div class="col">
                <div class="text-center">
                    <h3>Set 3 - Letter E</h3>
                    <div class="color-box m-box bg-dark" data-color-code-m="2"></div>
                    <div class="color-box m-box  bg-primary" data-color-code-m="3"></div>
                </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>