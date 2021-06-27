<html>

<head>
    <title>From thêm sách</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>



    <h2>From thêm sách</h2>

    <form action="xuly_them.php" method="POST">

        isbn:
        <br><input type="text" name="isbn">

        <br><br> author:
        <br><input type="text" name="author">

        <br><br> category:
        <br><input type="text" name="category">

        <br><br> title:
        <br><input type="text" name="title">

        <br><br> images:
        <br><input type="text" name="images">

        <br><br> price:
        <br><input type="text" name="price">

        <br><br>
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" value="Lưu">

    </form>
</body>

</html>