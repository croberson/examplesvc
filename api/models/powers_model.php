<?php
namespace Api\Models;

use Api\Vendor as Vendor;

require_once 'base_model.php';

class PowersModel extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = "pairings";
    }
    
    /**
     * This function adds a power to the database.
     */
    public function addPower($power) {
        //clean the input
        $power = mysql_real_escape_string($power);
        
        //add new power to the database
        $query = "INSERT INTO powers (name) VALUES ('$power')";
        $this->db->execute($query);
        return $this->getInsertId();
    }
    
    /**
     * This function edits a power to the database.
     */
    public function editPower($name, $id) {
        //clean the input
        $name = mysql_real_escape_string($name);
        
        $query = "UPDATE powers SET name = '$name' WHERE id = $id";
        $result = $this->db->execute($query, array($name));
    }
    
    /**
     * This function deletes a power to the database.
     */
    public function deletePower($id) {
        $query = "DELETE FROM powers WHERE id = $id";
        $this->db->execute($query);
    }
}
?>