<?php
include 'db.php';
$user_id = $_SESSION['id'];
$id = $_GET['id'];

$sql = $conn->prepare('select * from blogs where id=? and user_id=?');
$sql->bind_param('ii', $id, $user_id);
$sql->execute();
$result = $sql->get_result();
$blog = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$image_name");

    } else {
        $image_name = $blog['image_name'];
    }

    $update_blog = $conn->prepare('UPDATE blogs set title=?, content=?, image_name=? where id=? and user_id=?');
    $update_blog->bind_param('sssii', $title, $content, $image_name, $id, $user_id);
    $update_blog->execute();
    header('Location:dashboard.php');
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

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container mt-5 bg-dark rounded" style="height:400px;width:550px;border:2px solid black">
            <h1 class="bg-success rounded mt-2 text-light d-flex justify-content-center">Edit BLOG</h1>

            <div class="card bg-dark">
                <div class="card-body bg-dark">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="<?php echo $blog['title']; ?>" name="title"
                                id="formId1" placeholder="" />
                            <label for="formId1">Title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="<?php echo $blog['title']; ?>" name="content"
                                id="formId1" placeholder="" />
                            <label for="formId1">Content</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="image" id="formId1" placeholder="" />
                            <label for="formId1">Image</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
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