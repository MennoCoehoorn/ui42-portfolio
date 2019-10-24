<?php 

include('config/db_connect.php');

$errors = array ('email'=>'','title'=>'','author'=>'','genre'=>'','pages'=>'');
$pages = $email = $title = $author =$genre = '';
 

if(isset($_POST['submit'])){

    if(empty($_POST['email'])){
        $errors['email']= 'An email is required <br/><br/>';
    }
    else{
        $email=$_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email']= 'Email must be a valid email adress';
            }
    }

    if(empty($_POST['title'])){
        $errors['title']= 'A title is required <br/><br/>';
    }
    else{
        $title=$_POST['title'];
    }

    if(empty($_POST['author'])){
        $errors['author']= 'An author is required <br/><br/>';
    }
    else{
        $author=$_POST['author'];
    }

    if(empty($_POST['genre'])){
        $errors['genre']= 'A genre is required <br/><br/>';
    }
    else{
        $genre=$_POST['genre'];
    }

    if(empty($_POST['pages'])){
        $errors['pages']= 'A page count is required <br/><br/>';
    }
    else{
        $pages=$_POST['pages'];
        if(!preg_match('/^[0-9]+$/',$pages)){
            $errors['pages']= 'Page count must only contain numbers';
        }
    }

    if(array_filter($errors)){
        echo 'errors in the form';
    }
    else{
        $email=mysqli_real_escape_string($conn, $email);
        $title=mysqli_real_escape_string($conn, $title);
        $author=mysqli_real_escape_string($conn, $author);
        $genre=mysqli_real_escape_string($conn, $genre);
        $pages=mysqli_real_escape_string($conn, $pages);

        $sql = "INSERT INTO books(email,title,Author,genre,pages) VALUES('$email','$title','$author','$genre','$pages')";

        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        }
        else{
            echo 'query error: ' . mysqli_error($conn);
        }

    }



}


?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php');?>

<section class="container grey-text">
    <h4 class="center details">Add a Book</h4>
    <form action="add.php" method="POST">
        <label for="email">Your Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email)?>">
        <div class="red-text"><?php echo $errors['email']?></div>
        <label for="title">Title of the Book:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
        <div class="red-text"><?php echo $errors['title']?></div>
        <label for="Author">Author of the Book:</label>
        <input type="text" name="author" value="<?php echo htmlspecialchars($author)?>">
        <div class="red-text"><?php echo $errors['author']?></div>
        <label for="genre">Genre of the Book:</label>
        <input type="text" name="genre" value="<?php echo htmlspecialchars($genre)?>">
        <div class="red-text"><?php echo $errors['genre']?></div>
        <label for="pages" >Number of Pages:</label>
        <input type="text"  name="pages" value="<?php echo htmlspecialchars($pages)?>">
        <div class="red-text"><?php echo $errors['pages']?></div>
        <br><br>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn books">
        </div>

        
    </form>
</section>

<?php include('templates/footer.php');?>
</html>