<?php
namespace Api\Vendor;

/**
 * This class is responsible for connecting to the db and executing queries.
 * Manipulation of raw db results is done in the models.
 */
class DB {
    const DB_SERVER = "localhost";
    const DB_USER = "examplesvc";
    const DB_PASSWORD = "*********************";
    const DB = "examplesvc";
    
    private $db = null;
    
    public function __construct()
    {
        $this->dbConnect(); // Initiates the Database connection
    }
    
    public function dbConnect()
    {
        $this->db = mysqli_connect(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD);
        
        if($this->db) {
            mysqli_select_db($this->db, self::DB);
        }
    }
    
    public function getDB()
    {
        return $this->db;
    }
    
    /**
     * This function executes queries that are built in models
     */
    public function execute($q)
    {
        return mysqli_query($this->db, $q);
    }
}
?>
