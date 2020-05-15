<?php
class Book
{
    var $book_id;
    var $name;
    var $description;
    var $image;
    var $status;
    var $category_id;
    var $author_id;

    public function __construct($book_id, $name, $description, $image, $status, $category_id, $author_id)
    {
        $this->book_id = $book_id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->status = $status;
        $this->author_id = $author_id;
        $this->category_id = $category_id;
    }
    public function get_list()
    {
        $data = [];
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        foreach ($pdo->query("SELECT * from tbl_book") as $row) {
            array_push($data,new Book($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]));
        }
        return $data;
    }
    public function get_an_item($request){
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"].":host=".$config["host"].";port=".$config["port"].";dbname=".$config["dbname"],$config["username"],$config["password"]);
        $stmt = $pdo->prepare("SELECT * FROM tbl_book WHERE book_id=?");
        $stmt->execute([$request]);
        $book = $stmt->fetch();
        return $book;
    }
    public function insert($request){
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $sql = "INSERT INTO tbl_book (name,description,image,status,author_id,category_id) VALUES (?,?,?,?,?,?) ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$request["name"],$request["description"],$request["image"],$request["status"],$request["author_id"],$request["category_id"]]);
    }
    public function update($request){
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $sql = "UPDATE tbl_book SET name = ? , description = ? , image = ? , status = ? , author_id = ? , category_id = ? WHERE book_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$request["name"],$request["description"],$request["image"],$request["status"],$request["author_id"],$request["category_id"],$request["book_id"]]);
    }
    public function delete($request){
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $sql = "DELETE FROM tbl_book WHERE book_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$request]);
    }
    
}
