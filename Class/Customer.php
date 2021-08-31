<?php
/**
 * Description of customerModel
 *
 * @author Tran Tuan Anh
 */
include_once '../../connection.php';
class CustomerModel {
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
}
