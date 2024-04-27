<?php
   /*session_start();*/
   require_once "logic.php";
   error_reporting(E_ALL);
   ini_set('display_errors', 1);

    $query = "SELECT id, title FROM articles ORDER BY id desc";
    $articles = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NavBar</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="navdiv">
        <div class="logo">
        <img src="../assets/images/logo.jpg" alt="logo" class=logo-icon/>
        <!-- <img src="sprout.png" alt="sprout" class="sprout"> -->
        <span class="empower">Empower</span><span class="minds">Minds</span>
        </div>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../articles.php">Blogs</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="../stories.php">Stories</a></li>
                <button ><a href="../login.php" class="btn">Login</a></button>
            </ul>
         </div>
    </nav>

<section class="dashboard">
    <div class="container dashboard_container">
        <aside>
            <ul>
                <li>
                    <a href="add_article.php"><i class="uil uil-pen"></i>
                    <h4>Add Article</h4>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php" class="active"><i class="uil uil-list-ul"></i>
                    <h4>Manage Articles</h4>
                    </a>
                </li>
                <li>
                    <a href="add_user.php"><i class="uil uil-user-plus"></i>
                    <h4>Add User</h4>
                    </a>
                </li>
                <li>
                    <a href="manage_users.php" ><i class="uil uil-postcard"></i>
                    <h4>Manage Users</h4>
                    </a>
                </li>
                <li>
                    <a href="verify_stories.php"><i class="uil uil-file-check-alt"></i>
                    <h4>Verify Stories</h4>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage articles </h2>
            <?php if(isset($_SESSION['add-article'])) : ?>
               <div class="alert_message success">
                <p>
                    <?= $_SESSION['add-article']; 
                    unset($_SESSION['add-article']);
                    ?>
                </p>
            </div>
            <?php elseif(isset($_SESSION['edit-article'])) : ?>
               <div class="alert_message success">
                <p>
                    <?= $_SESSION['edit-article']; 
                    unset($_SESSION['edit-article']);
                    ?>
                </p>
            </div>
        <?php endif ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php while($article = mysqli_fetch_assoc($articles)) : ?>
                    <tr>
                        <td><?= $article['title'] ?></td>
                        <td><a href="edit_article.php?id=<?= $article['id'] ?>" class="btn sm">Edit</a></td>
                        <td><a href="delete_article.php?id=<?= $article['id'] ?>" class="btn sm danger">Delete</a></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </main>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer col">
            <h4>More on us </h4>
            <ul>
                <li>
                    <a href="#">about us</a>
                </li>
            </ul>
            </div>
            <div class="footer col">
            <h4>get help</h4>
            <ul>
                <li>
                    <a href="#">here</a>
                </li>
            </ul>
            </div>
            <div class="footer col">
            <h4>Details</h4>
            <ul>
                <li>
                    <a href="#">Remarks</a>
                </li>
            </ul>
            </div>
            <div class="footer col">
            <h4>follow us</h4>
            <div class="social-links">
                    <a href="#" class="one"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="one" ><i class="fab fa-twitter"></i></a>
                    <a href="#" class="one"><i class="fab fa-instagram"></i></a>
            </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
