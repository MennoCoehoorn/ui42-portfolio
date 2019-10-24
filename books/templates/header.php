<!DOCTYPE html>

<head>
    <title>The Book Stash</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">

    .books{
        background-color: brown;
        color: aliceblue;
    }
    .books-text{
        position: relative;
        color: brown;
        left: 43.5%;
        font-size: 2em;
    }
    .navbar{
        background-color: aliceblue;
    }
    .delete{
        background-color: brown;
        color: aliceblue;
        margin: 10px, 10px;
    }
    .details{
        color: brown;
    }
    .pic{
        width: 150px;
        position:relative;
        margin: 40px auto -30px;
        display: block;
        top:-30px;
    }

</style>
</head>


<body>
    <nav class="navbar">
        <div>
            <a href="index.php" class="books-text">The Book Stash</a>
            <ul class="right hide-on-small-and-down">
                <li><a href="add.php" class="btn books">Add a Book</a></li>
            </ul>
        </div>
    </nav> 

