<?php
    class Comment {
        var $comment_id;
        var $book_id;
        var $user_id;
        var $chapter_id;
        var $content;
        var $date;

        public function __construct($comment_id,$book_id,$user_id,$chapter_id,$content,$date)
        {
            $this->comment_id = $comment_id;
            $this->book_id = $book_id;
            $this->user_id = $user_id;
            $this->chapter_id = $chapter_id;
            $this->content = $content;
            $this->date = $date;
        }

        public function get_list()
        {
            $data = [];
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            foreach ($pdo->query("SELECT * from tbl_comment") as $row) {
                array_push($data,new Comment($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
            }
            return $data;
        }

        public function insert($request){
            $config = include CONFIG . "config.php";
            $pdo = new PDO($config["dsn"] . ":host=" . $config["host"] . ";port=" . $config["port"] . ";dbname=" . $config["dbname"], $config["username"], $config["password"]);
            $sql = "INSERT INTO tbl_comment (comment_id,book_id,user_id,chapter_id,content,date) VALUES (?,?,?,?,?,?) ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$request["comment_id"],$request["book_id"],$request["user_id"],$request["chapter_id"],$request["content"],$request["date"]]);
        }
    }
?>