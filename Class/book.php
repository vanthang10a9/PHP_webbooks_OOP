<?php
include_once '../../connection.php';
class BookModel
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

    public function getAll()
    {
        $sql = "SELECT * FROM books";
        return $this->run_my_select_sql($sql);
    }

    public function getPage($page, $sl = 20)
    {
        $sql = "SELECT *
                FROM books
                LIMIT $sl";
        return $this->run_my_select_sql($sql);
    }

    public function getByCategory($category)
    {
        $sql = "SELECT *
                FROM books
                WHERE category = '$category'";
        return $this->run_my_select_sql($sql);
    }

    public function getByISBN($isbn)
    {
        $sql = "SELECT *
                FROM books
                WHERE isbn = '$isbn'";
        return $this->run_my_select_sql($sql);
    }

    public function findByName($name)
    {
        $sql = "SELECT *
                FROM books
                WHERE title LIKE '%$name%'";
        return $this->run_my_select_sql($sql);
    }

    public function insert(...$book)
    {
        $sql = "INSERT INTO books
                VALUES ('"
            . $book['isbn'] . "', '"
            . $book['author'] . "', '"
            . $book['category'] . "', '"
            . $book['title'] . "', '"
            . $book['images'] . "',"
            . $book['price']
            . ")";
        return $this->run_my_select_sql($sql);
    }

    public function delete($isbn)
    {
        $sql = "DELETE FROM books WHERE isbn = $isbn";
        return $this->run_my_select_sql($sql);
    }

    public function update(...$book)
    {
        $sql = "UPDATE books
                SET "
            // . "'isbn' = '" . $book['isbn'] . "', '"
            . " author = '" . $book['author'] . "',"
            . " category = '" . $book['category'] . "',"
            . " title = '" . $book['title'] . "',"
            . " images = '" . $book['images'] . "',"
            . " price = '" . $book['price']
            . "'"
            . " WHERE isbn = '" . $book['isbn'] . "'";
        return $this->run_my_select_sql($sql);
    }
}
