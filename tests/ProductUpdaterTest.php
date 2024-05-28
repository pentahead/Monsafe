<?php
require_once'.\app\config\Config.php';
require_once'.\app\core\Database.php';
require_once'.\app\models\EditDataBarangModel.php';
use PHPUnit\Framework\TestCase;

class ProductUpdaterTest extends TestCase {

    public function testUpdateProduct() {
        // Mock the DatabaseAdapter class
        $databaseMock = $this->createMock(DatabaseInterface::class);
        $databaseMock->expects($this->once())
            ->method('query')
            ->willReturn(null); // Add any necessary mocks for query method
        $databaseMock->expects($this->exactly(5))
            ->method('bind')
            ->willReturn(null); // Add any necessary mocks for bind method
        $databaseMock->expects($this->once())
            ->method('execute')
            ->willReturn(true); // Adjust this based on your actual expected return

        // Creating an instance of ProductUpdater and injecting the mock DatabaseAdapter
        $productUpdater = new ProductUpdater($databaseMock);

        // Call the updateProduct method
        $result = $productUpdater->updateProduct(1, 'New Product', 10, 'Active', 'new_product.jpg');

        // Assert the expected result
        $this->assertTrue($result);
    }
}

// ProductUpdater class with dependency injection
class ProductUpdater {
    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }
    
    public function updateProduct($id, $nama, $stok, $status, $foto) {
        $sql = "UPDATE barang SET nama = :nama, stok = :stok, status = :status, foto = :foto WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':status', $status);
        $this->db->bind(':stok', $stok);
        $this->db->bind(':foto', $foto);

        return $this->db->execute();
    }
}

// DatabaseInterface to define the contract
interface DatabaseInterface {
    public function query($sql);
    public function bind($param, $value);
    public function execute();
}
