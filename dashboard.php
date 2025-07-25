<?php
include 'db.php';

$user_id = $_SESSION['id'];
$result = $conn->query('select blogs.*, users.username from blogs inner join users on blogs.user_id=users.id');

if (!isset($user_id)) {
    header('Location:login.php');
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
</head>

<body style="background-color: #F4F4FA;">
    <header>
        <!-- place navbar here -->
    </header>
    <main>

        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#1E1E2F;">
            <div class="container">
                <a class="navbar-brand" href="#">Blogs</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="home.php" aria-current="page">Home
                                <span class="visually-hidden">(current)</span></a>
                        </li>

                    </ul>
                    <div class="d-flex my-2 my-lg-0">
                        <a name="" id="" class="btn btn-warning mx-2" href="addproduct.php" role="button">Add
                            Product</a>
                        <a name="" id="" class="btn btn-danger" href="logout.php" role="button">Logout</a>

                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                        aria-label="First slide"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="https://images.pexels.com/photos/221387/pexels-photo-221387.jpeg?cs=srgb&dl=pexels-pixabay-221387.jpg&fm=jpg"
                            class="w-100 d-block" alt="First slide" />
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/221387/pexels-photo-221387.jpeg?cs=srgb&dl=pexels-pixabay-221387.jpg&fm=jpg"
                            class="w-100 d-block" alt="Second slide" />
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/221387/pexels-photo-221387.jpeg?cs=srgb&dl=pexels-pixabay-221387.jpg&fm=jpg"
                            class="w-100 d-block" alt="Third slide" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

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