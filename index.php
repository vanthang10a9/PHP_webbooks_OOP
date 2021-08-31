<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
        include_once 'customerModel.php';
        include_once './Class/book.php';

        $customerModel = new Customer_Model();
        $result = $customerModel->getAll();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "customerid: " . $row["customerid"] . " - Tên: " . $row["Name"] . "  - Địa chỉ: " . $row["Address"] . " - Thành phố: " . $row["City"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        // dung model books
        $bookModel = new BookModel();
        $book = array();
            $book['isbn'] = "124";
            $book['author'] = "Tran tuan anh";
            $book['category'] = "Sach moi";
            $book['title'] = "New book add by Thang";
            $book['images'] = "thi is images";
            $book['price'] = 209;
        $result = $bookModel->update(...$book) ;

        // $result = $bookModel->delete('123') ;
        // if ($result->num_rows > 0) {
        if ($result) {
            // while ($row = $result->fetch_assoc()) {
            //     echo "</br> ket qua tim theo ten sach: " . $row["title"];
            // }
            echo strval($result);
        } else {
            echo "</br> ket qua tim theo ten sach:  $result";
        }

    ?>
</body>
</html>