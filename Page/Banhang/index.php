<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

        button.cart {
            float: right;
            padding: 5px 5px;
        }
    </style>
</head>

<body>

    <button class="cart" onclick="gotoCartPage()">Xem giỏ hàng</button>
    <h2>Books Table</h2>

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

        $result = $bookModel->getAll();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"
                    . "<td>" . $row['isbn'] . "</td>"
                    . "<td>" . $row['author'] . "</td>"
                    . "<td>" . $row['category'] . "</td>"
                    . "<td>" . $row['title'] . "</td>"
                    . "<td>" . $row['images'] . "</td>"
                    . "<td>" . $row['price'] . "</td>"
                    . "<td>"
                    .  ' <button onclick = "addCart(' . " ' " . $row["isbn"] . " ' )" . ' ">'
                    . "Add to Cart
                        </button>
                        </td>"
                    . "</tr>";
            }
        } else {

            echo  "<button onclick=addCart('" . $row['isbn'] . "')>";
        }

        ?>
    </table>

</body>

<script>
    function addCart(isbn) {
        $.post("./cart.php", {
            "isbn": isbn
        });
    }

    function gotoCartPage() {
        window.location = './cart.php';
    }
</script>

</html>