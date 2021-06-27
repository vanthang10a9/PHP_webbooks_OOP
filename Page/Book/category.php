<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid grey;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <?php include_once 'menusach.php'; ?>

    <table id="t01">
        <tr>
            <th>isbn</th>
            <th>author</th>
            <th>category</th>
            <th>title</th>
            <th>images</th>
            <th>price</th>
            <th>Thao tác</th>
        </tr>
        <?php
        include_once '../../Class/book.php';

        $bookModel = new BookModel();

        if(isset($_GET["category"])){
            echo "<h2>Book for category: " . $_GET["category"];
            $result = $bookModel->getByCategory($_GET["category"]);
        }else{
            $result = $bookModel->getAll();
        }
       
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"
                    . "<td>" . $row['isbn'] . "</td>"
                    . "<td>" . $row['author'] . "</td>"
                    . "<td>" . $row['category'] . "</td>"
                    . "<td>" . $row['title'] . "</td>"
                    . "<td>" . $row['images'] . "</td>"
                    . "<td>" . $row['price'] . "</td>"
                    . "<td>
                            <button><a href='./suasach.php?isbn=" . $row['isbn'] . "'>Sửa</a></button>
                            <button><a href='./xoasach.php?isbn=" . $row['isbn'] . "'>Xóa</a></button>
                        </td>"
                    . "</tr>";
            }
        } else {
            echo "0 results";
        }

        ?>
    </table>

</body>

</html>