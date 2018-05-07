<?php
namespace Api\Models;

use Api\Vendor as Vendor;

require_once 'BaseModel.php';

class HeroesModel extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = "pairings";
    }
    
    /**
     * This function adds a hero to the database.
     */
    public function addHero($name) {
        //clean the input
        $name = mysql_real_escape_string($name);
        
        //add a new hero to the database
        $query = "INSERT INTO heroes (name) VALUES ('$name')";
        $result = $this->db->execute($query, array($name));
        return $this->getInsertId();
    }
    
    /**
     * This function edits a hero to the database.
     */
    public function editHero($name, $id) {
        //clean the inputs
        $name = mysql_real_escape_string($name);
        
        $query = "UPDATE heroes SET name = '$name' WHERE id = $id";
        $result = $this->db->execute($query, array($name));
    }
    
    /**
     * This function deletes a hero to the database.
     */
    public function deleteHero($id) {
        $query = "DELETE FROM heroes WHERE id = $id";
        $this->db->execute($query);
    }
}
?>