<?php
class Chapter
{
    var $chapter_id;
    var $book_id;
    var $number;
    var $name;
    var $number_of_access;


    public function __construct($chapter_id, $book_id, $number, $name,$number_of_access)
    {
        $this->chapter_id = $chapter_id;
        $this->book_id = $book_id;
        $this->number = $number;
        $this->name = $name;
        $this->number_of_access = $number_of_access;
    }

    public function get_list()
    {
        $data = [];
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        foreach ($pdo->query("SELECT * from tbl_chapter") as $row) {
            array_push($data, new Chapter($row[0], $row[1], $row[2], $row[3],$row[4]));
        }
        return $data;
    }

    public function get_an_item($request)
    {
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $stmt = $pdo->prepare("SELECT * FROM tbl_chapter WHERE chapter_id=?");
        $stmt->execute([$request]);
        $chapter = $stmt->fetch();
        return $chapter;
    }

    public function insert($request){
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $sql = "INSERT INTO tbl_chapter (book_id,number,name) VALUES (?,?,?,0) ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$request["book_id"],$request["number"],$request["name"]]);
    }
    public function update($request){
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $sql = "UPDATE tbl_chapter SET book_id = ? , number = ? , name = ? WHERE chapter_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$request["book_id"],$request["number"],$request["name"]]);
    }
    public function increse_number_of_access($request){
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $sql = "UPDATE tbl_chapter SET number_of_access += 1 WHERE chapter_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$request]);
    }
    public function total_of_access($request) {
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $sql = "SELECT sum(number_of_access) as total FROM tbl_chapter WHERE book_id = ? GROUP BY book_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$request]);
        $query =  $stmt->fetch();
        $total = $query["total"];
        return $total;
    }
    public function delete($request){
        $config = include CONFIG . "config.php";
        $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
        $sql = "DELETE FROM tbl_chapter WHERE chapter_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$request]);
    }
}
