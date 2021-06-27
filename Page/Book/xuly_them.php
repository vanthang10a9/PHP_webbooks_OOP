<?php include_once '../../Class/book.php'; ?>

<?php if (isset($_POST['form_submitted'])) : ?>

    <?php

    $bookModel = new BookModel();

    $book = array();
    $book['isbn'] = $_POST['isbn'];
    $book['author'] = $_POST['author'];
    $book['category'] = $_POST['category'];
    $book['title'] = $_POST['title'];
    $book['images'] = $_POST['images'];
    $book['price'] = $_POST['price'];

    $result = $bookModel->insert(...$book);

    if ($result) {       
        header("Location: ./index.php");
    } else {        
        header("Location: ./themsach.php");
    }

    
    ?>    

<?php endif; ?>