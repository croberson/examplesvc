<?php
namespace Api\Models;

use Api\Vendor as Vendor;

/**
 * All models will extend this class.
 * This class builds queries and executes them.
 */
class BaseModel {
    protected $table;
    protected $db;
    
    protected function  __construct()
    {
        //Get a db object.
        //A future improvement would be to wrap in try/catch
        //and fail gracefully if something happens to the session
        //and db object is not found.
        
        $this->db = new Vendor\DB();
    }
    
    /**
     * This function gets all of the records of a table.
     * A future improvement would be to add an "enabled" field to all tables
     *     and have a function to get all enabled records.
     */
    protected function getAll()
    {
        $result = $this->db->execute("SELECT * FROM $this->table");
        $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        //Free up result set.  Keeps db calm in case of a lot of db activity.
        mysqli_free_result($result);
        
        return $resultArray;
    }
    
    /**
     * This function returns the last insert id
     */
    protected function getInsertId()
    {
        return mysqli_insert_id($this->db->getDB());
    }
    
    /**
     * This function converts multiple db results records
     * into an array of associative arrays.
     */
    protected function getArrays($result)
    {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>