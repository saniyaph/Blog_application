<?php
include 'db.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $sql = $conn->prepare('select id, password from users where username=?');
    $sql->bind_param('s', $username);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($id, $hashpass);
    $sql->fetch();

    if (password_verify($password, $hashpass)) {
        $_SESSION['id'] = $id;
        $_SESSION['uname'] = $username;
        header('Location:dashboard.php');
    }



}


?>





<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />


    <style>
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>




        <div class="container mt-5 d-flex justify-content-center">
            <div class="bg-dark text-white p-4 rounded shadow" style="width: 550px; border: 2px solid black;">
                <h2 class="text-center bg-primary text-white py-2 rounded">Login</h2>
                <form class="mt-4" action="" method="post">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="uname" id="uname" placeholder="UserName" />
                        <label for="uname">UserName</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" />
                        <label for="pass">Password</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>



        </form>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>