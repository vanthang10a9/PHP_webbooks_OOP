<?php include_once '../../Class/book.php';
if (isset($_POST['Choice'])) {
    if($_POST['Choice']=='Yes'){

        $bookModel = new BookModel();
       try{
        $result = $bookModel->delete($_POST['isbn']);
       }catch(Exception $e){
           echo $e;
       }
        if ($result) {       
            echo "<script>
            alert('Xóa thành công $result');
            window.location='./index.php';
            </script>";
        } else {        
            echo "<script>
            alert('Lỗi ràng buộc, không thể xóa!');
            window.location='./index.php';
            </script>";
        }
        
    }else{
        echo "<script>
        alert('Đã hủy thao tác xóa!');
        window.location='./index.php';
        </script>";
    }
}
    
?>
<html>

<head>
    <title>From xóa sách</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        body {
            text-align: center;
        }

        form {
            display: inline-block;
        }
    </style>
</head>

<body>
    <form action="./xoasach.php" method="POST">
        <h3>Bạn có chắc muốn xóa sách này!</h3>
        isbn sách
        <br><input type="text" name="isbn" value="<?php echo $_GET['isbn']; ?>" >

        <br><br>
        <input type="radio" id="Yes" name="Choice" value="Yes">
        <label for="Yes">Yes</label>
        <input type="radio" id="No" name="Choice" value="No">
        <label for="No">No</label>
        <br><br>
        <input type="submit" value="Xác nhận">

    </form>
</body>

</html>