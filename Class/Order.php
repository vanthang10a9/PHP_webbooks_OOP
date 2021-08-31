<?php
include_once '../../connection.php';
class OrderModel 
{
    private $con;

    function __construct()
    {
        $this->con = ketnoiCSDL();
    }

    private function run_my_select_sql($sql)
    {
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function getAllOrder()
    {
        $sql = "SELECT O.orderid, C.Name, O.amount, O.date
                FROM orders O
                INNER JOIN customers C
                ON C.customerid = O.customerid
                ";
        return $this->run_my_select_sql($sql);
    }

    public function getOrderItems($orderid)
    {
        $sql = "SELECT  
                    B.isbn ,  B.author ,  B.title ,  B.category ,  B.images ,  B.price  
                    , OI.quantity
                FROM    
                    books  B
                    order_items OI
                WHERE   
                    OI.orderid = $orderid
                ";
        return $this->run_my_select_sql($sql);
    }

    public function addOrder($customerid, $amout, $date)
    {
        $sql = "INSERT INTO orders ( orderid ,  customerid ,  amount ,  date )
                VALUES ("
            . $customerid . ", '"
            . $amout . "',"
            . $date
            . ")";
        return $this->run_my_select_sql($sql);
    }

    public function addOrder_items($orderid, $isbn, $quantity)
    {
        $sql = "INSERT INTO  order_items ( orderid ,  isbn ,  quantity )
                VALUES ( $orderid , '$isbn' ,  $quantity )" ;
        return $this->run_my_select_sql($sql);
    }
}
