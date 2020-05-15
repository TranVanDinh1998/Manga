<?php
    class Category {
        var $category_id;
        var $name;
        var $description;

        public function __construct($category_id,$name,$description)
        {
            $this->category_id = $category_id;
            $this->name = $name;
            $this->description = $description;
        }

        public function get_list() {
            $data = [];
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            foreach ($pdo->query("SELECT * FROM tbl_category") as $row) {
                array_push($data,new Category($row[0],$row[1],$row[2]));
            }
            return $data;
        }

        public function get_an_item($request) {
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"].":host=".$config["host"].";port=".$config["port"].";dbname=".$config["dbname"],$config["username"],$config["password"]);
            $stmt = $pdo->prepare("SELECT * FROM tbl_category WHERE category_id=?");
            $stmt->execute([$request]);
            $category = $stmt->fetch();
            return $category;
        }

        public function insert($request){
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            $sql = "INSERT INTO tbl_category (name,description) VALUES (?,?) ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$request["name"],$request["description"]]);
        }

        public function update($request){
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            $sql = "UPDATE tbl_category SET name = ? , description = ? WHERE category_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$request["name"],$request["description"]]);
        }

        public function delete($request){
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            $sql = "DELETE FROM tbl_category WHERE category_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$request]);
        }
    }
?>