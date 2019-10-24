<?php 

include('config/db_connect.php');

if(isset($_POST['delete'])){

    $id_to_delete=mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM books WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){

        header('Location: index.php');

    }else{
        echo 'query error: ' . mysqli_error($conn);
    }
}

if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM books WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $book = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php');?>

<div class="container center">
    <?php if($book){?>
<div class="card">
    <div class="card-content">
        <h4 class="details"><?php echo htmlspecialchars($book['title']);?></h4>
        <p>Created by: <?php echo htmlspecialchars($book['email']);?></p>
        <p><?php echo date($book['created_at']);?></p>
        <h5 class="details">Characteristics:</h5>
        <ul>
            <li><?php echo 'Author: ' . htmlspecialchars($book['Author']);?></li>
            <li><?php echo'Genre: ' . htmlspecialchars($book['genre']);?></li>
            <li><?php echo 'Page count: ' . htmlspecialchars($book['pages']);?></li>
        </ul>

        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $book['id']?>">
            <input type="submit" name="delete" value="Delete" class="btn delete">
        </form>
    </div>
</div>
    <?php }else{?>

        <h5>No such book exists</h5>

    <?php }?>
</div>

<?php include('templates/footer.php');?>

</html>