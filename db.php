<?php 

class Database {
    public $pdo;

    public function __construct($db="test", $user="root", $pwd="", $host="localhost:3307") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to $db succesfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insert($name, $email) {
        $sql = "INSERT INTO users (name, email)
        VALUES (?, ?)";
        $statement = $this->pdo->prepare($sql);
        
        $statement->execute([$name, $email]);
    }

    public function select($id = null) {
        if ($id != null) {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetch();
        } else {
            $stmt = $this->pdo->query("SELECT * FROM users");
            $result = $stmt->fetchAll();
        }
        return ($result);
    }

    public function update($id, $name, $email) {
        $sql = "UPDATE users SET name=?, email=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $email, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

}
?>