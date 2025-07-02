<?php
require_once 'Connect.php';

class UserModel
{
    private $conn;
    
    public function __construct()
    {
        $this->conn = conn();
    }
    
    public function login($username, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE username = :username OR email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':email' => $username
            ]);
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            
            return false;
            
        } catch (PDOException $e) {
            error_log("Login error: " . $e->getMessage());
            return false;
        }
    }
    
    public function register($data)
    {
        try {
            $sql = "INSERT INTO users (username, email, password, full_name, phone, address) 
                   VALUES (:username, :email, :password, :full_name, :phone, :address)";
            
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':username' => $data['username'],
                ':email' => $data['email'],
                ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
                ':full_name' => $data['full_name'] ?? '',
                ':phone' => $data['phone'] ?? '',
                ':address' => $data['address'] ?? ''
            ]);
            
        } catch (PDOException $e) {
            error_log("Register error: " . $e->getMessage());
            return false;
        }
    }
    
    public function getUserById($id)
    {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Get user error: " . $e->getMessage());
            return false;
        }
    }
    
    public function updateUser($id, $data)
    {
        try {
            $sql = "UPDATE users SET 
                   full_name = :full_name,
                   email = :email,
                   phone = :phone,
                   address = :address,
                   updated_at = CURRENT_TIMESTAMP
                   WHERE id = :id";
            
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':id' => $id,
                ':full_name' => $data['full_name'],
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':address' => $data['address']
            ]);
            
        } catch (PDOException $e) {
            error_log("Update user error: " . $e->getMessage());
            return false;
        }
    }
    
    public function changePassword($id, $newPassword)
    {
        try {
            $sql = "UPDATE users SET password = :password WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':id' => $id,
                ':password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ]);
            
        } catch (PDOException $e) {
            error_log("Change password error: " . $e->getMessage());
            return false;
        }
    }
    
    public function checkUsernameExists($username)
    {
        try {
            $sql = "SELECT COUNT(*) FROM users WHERE username = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':username' => $username]);
            
            return $stmt->fetchColumn() > 0;
            
        } catch (PDOException $e) {
            error_log("Check username error: " . $e->getMessage());
            return false;
        }
    }
    
    public function checkEmailExists($email)
    {
        try {
            $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            
            return $stmt->fetchColumn() > 0;
            
        } catch (PDOException $e) {
            error_log("Check email error: " . $e->getMessage());
            return false;
        }
    }
}
?>
