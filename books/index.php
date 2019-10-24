<?php 

    include('config/db_connect.php');

    $sql = 'SELECT title, author, genre, pages, id FROM books ORDER BY created_at';

    $result = mysqli_query($conn, $sql);

    $books = mysqli_fetch_all($result,MYSQLI_ASSOC); 

    mysqli_free_result($result);

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>

    <h4 class="books-text">The Books:</h4>
    
    <div class="container">
        <div class="row">

            <?php foreach($books as $book){?>
                <div class="col s6 md3">
                    <div class="card">
                        <img src="img/books.png" alt="books" class="pic">
                        <div class="card-content">
                            <h5><?php echo htmlspecialchars($book['title']);?></h5>
                            <h6><?php echo htmlspecialchars($book['author']);?></h6>
                            <ul>
                                <li><?php echo 'Genre: '.htmlspecialchars($book['genre']);?></li>
                                <li><?php echo 'Page count: '.htmlspecialchars($book['pages']);?></li>
                            </ul>
                        </div>
                        <div class="card-action center-align">
                            <a href="details.php?id=<?php echo $book['id']?>" class="btn books">More Info</a>
                        </div>
                    </div>
                </div>
            <?php }?>

        </div>
    </div>

    <?php include('templates/footer.php');?>
</html>
