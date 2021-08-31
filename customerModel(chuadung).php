<?php
/**
 * Description of customerModel
 *
 * @author Tran Tuan Anh
 */
include_once 'connection.php';
class Customer_Model {
    private $con;

    function __construct(){ 
        $this->con = ketnoiCSDL();
    }

    function run_my_select_sql($sql) {
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function getAll() {
        $sql = "SELECT customerid, Name, Address, City FROM customers";
        return $this->run_my_select_sql($sql);
    }

    public function getByID ($id) {
        $sql = "SELECT customerid, Name, Address, City 
                FROM customers
                WHERE customerid = $id";
        return $this->run_my_select_sql($sql);
    }

    public function getByName($name){
        $sql = "SELECT customerid, Name, Address, City 
                FROM customers
                WHERE Name = '$name'";
        return $this->run_my_select_sql($sql);
    }    
    test 3
    
}
