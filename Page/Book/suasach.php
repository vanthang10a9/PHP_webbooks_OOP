<html>

<head>
    <title>From thêm sách</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>

    <?php
    include_once '../../Class/book.php';

    $bookModel = new BookModel();

    $result = $bookModel->getByISBN($_GET['isbn']);
    $row = $result->fetch_assoc();    

    ?>

    <h2>From sửa sách</h2>

    <form action="xuly_sua.php" method="POST">

        isbn:
        <br><input type="text" name="isbn" value="<?php echo $row['isbn']; ?>" readonly>

        <br><br> author:
        <br><input type="text" name="author" value="<?php echo $row['author']; ?>">

        <br><br> category:
        <br><input type="text" name="category" value="<?php echo $row['category']; ?>">

        <br><br> title:
        <br><input type="text" name="title" value="<?php echo $row['title']; ?>">

        <br><br> images:
        <br><input type="text" name="images" value="<?php echo $row['images']; ?>">

        <br><br> price:
        <br><input type="text" name="price" value="<?php echo $row['price']; ?>">

        <br><br>
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" value="Lưu">

    </form>
</body>

</html>