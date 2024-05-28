<?php
require_once'.\app\config\Config.php';
require_once'.\app\core\Database.php';
require_once'.\app\models\Admin.php';


use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase {

    public function testCheckAdminLogin() {
        // Mock the database-related functionality
        $databaseMock = $this->createMock(DatabaseInterface::class);
        $databaseMock->expects($this->once())
            ->method('query')
            ->willReturn(null); // Add any necessary mocks for query method
        $databaseMock->expects($this->exactly(2))
            ->method('bind')
            ->willReturn(null); // Add any necessary mocks for bind method
        $databaseMock->expects($this->once())
            ->method('single')
            ->willReturn(['admin_data']); // Adjust this based on your actual expected return

        // Creating an instance of Admin and injecting the mock Database
        $admin = new Admins($databaseMock);

        // Call the CheckAdminLogin method
        $result = $admin->CheckAdminLogin('adminuser', 'adminpassword');

        // Assert the expected result
        $this->assertEquals(['admin_data'], $result);
    }
}

// Admin class with dependency injection
class Admins {
    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function CheckAdminLogin($username, $password) {
        $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
        $this->db->query($sql);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        return $this->db->single();
    }
}

// DatabaseInterface to define the contract
interface DatabaseInterface {
    public function query($sql);
    public function bind($param, $value);
    public function single();
}
