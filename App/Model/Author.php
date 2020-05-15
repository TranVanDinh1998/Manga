<?php
    class Author {
        var $author_id;
        var $name;
        var $description;

        public function __construct($author_id,$name,$description)
        {
            $this->author_id = $author_id;
            $this->name = $name;
            $this->description = $description;
        }

        public function get_list() {
            $data = [];
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            foreach ($pdo->query("SELECT * FROM tbl_author") as $row) {
                array_push($data,new Author($row[0],$row[1],$row[2]));
            }
            return $data;
        }

        public function get_an_item($request) {
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"].":host=".$config["host"].";port=".$config["port"].";dbname=".$config["dbname"],$config["username"],$config["password"]);
            $stmt = $pdo->prepare("SELECT * FROM tbl_author WHERE author_id=?");
            $stmt->execute([$request]);
            $author = $stmt->fetch();
            return $author;
        }

        public function insert($request){
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            $sql = "INSERT INTO tbl_author (name,description) VALUES (?,?) ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$request["name"],$request["description"]]);
        }

        public function update($request){
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            $sql = "UPDATE tbl_author SET name = ? , description = ? WHERE author_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$request["name"],$request["description"]]);
        }
        
        public function delete($request){
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            $sql = "DELETE FROM tbl_author WHERE author_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$request]);
        }
    }
?>