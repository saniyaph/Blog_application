<?php
include 'db.php';

$user_id = $_SESSION['id'];
$result = $conn->query('select blogs.*, users.username from blogs inner join users on blogs.user_id=users.id');
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
                <a class="navbar-brand" href="dashboard.php">Blogs</a>
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
                            BLOG</a>
                        <a name="" id="" class="btn btn-danger" href="logout.php" role="button">Logout</a>

                    </div>
                </div>
            </div>
        </nav>


        <div class="container d-flex justify-content-between mt-4">
            <div class="row">

                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="card m-2 "
                        style="width:360px;background-color:#F2F2F2;color:#2D2D2D;box-shadow:0 4px 8px rgb(0, 0, 0,0.5);">
                        <img class="card-img-top" src="uploads/<?php echo $row['image_name']; ?>" alt="Title"
                            width="200px" />
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['title']; ?></h4>
                            <p class="card-text"><?php echo $row['content']; ?></p>
                            <small>Created BY: <?php echo $row['username']; ?></small>
                            <small>At: <?php echo $row['created_at']; ?></small>
                            <?php
                            if ($row['user_id'] == $user_id) { ?>
                                <a class="btn btn-warning" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

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