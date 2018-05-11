<?php
namespace Api\Models;

use Api\Vendor as Vendor;

require_once 'base_model.php';

class PairingsModel extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = "pairings";
    }
    
    /**
     * This function gets all pairings from the database.
     */
    public function getPairings() {
        $query =    "SELECT p.id AS id, h.name AS name, pow.name as power, h.id AS heroId, pow.id AS powerId
                     FROM pairings AS p
                     LEFT JOIN heroes AS h ON h.id = p.hero_id
                     LEFT JOIN powers AS pow ON pow.id = p.power_id";
        $result = $this->db->execute($query);
        return $this->getArrays($result);
    }
    
    /**
     * This function adds a pairing to the database.
     */
    public function addPairing($heroId, $powerId) {
        //clean the inputs
        $name = mysql_real_escape_string($heroId);
        $power = mysql_real_escape_string($powerId);
        
        //add a new pairing to the db to map the user to the power
        $query = "INSERT INTO pairings (hero_id, power_id) VALUES ($heroId, $powerId)";
        $this->db->execute($query);
    }
    
    /**
     * This function deletes a pairing to the database.
     */
    public function deletePairing($id) {
        $query = "DELETE FROM pairings WHERE id = $id";
        $this->db->execute($query);
    }
}
?>