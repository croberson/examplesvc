<?php
namespace Api\Controllers;

use Api\Models as Models;

require_once "/vendor/rest.php";
require_once "/models/heroes_model.php";
require_once "/models/powers_model.php";
require_once "/models/pairings_model.php";

class SuperApiController extends \Api\Vendor\Rest
{
    private $PairingsModel;
    private $HeroesModel;
    private $PowersModel;
    
    public function __construct()
    {
       parent::__construct();// Init parent contructor
       
        $this->HeroesModel = new Models\HeroesModel();
        $this->PowersModel = new Models\PowersModel();
        $this->PairingsModel = new Models\PairingsModel();
    }
    
    /**
     * This method gets the current list of people and their superpowers
     */
    public function getPairings()
    {
        //only allow GET method
        if($this->getRequestMethod() != "GET") {
            $this->response('',406);
        }
        
        $data = array();
        $data['pairings'] = $this->PairingsModel->getPairings();
        $data['msg'] = 'Superpower pairings retrieved.';
        $this->response($this->json($data), 200);
    }
    
    /**
     * This method adds a superpower pairing to the db.
     */
    public function add()
    {
        //only allow POST method
        if($this->getRequestMethod() != "POST") {
            $this->response('',406);
        }
        
        //add the hero
        $heroId = $this->HeroesModel->addHero($this->_request['name']);
        
        //add the power
        $powerId = $this->PowersModel->addPower($this->_request['power']);
        
        //add the pairing
        $this->PairingsModel->addPairing($heroId, $powerId);
        
        //get the new list of pairings
        $data = array();
        $data['pairings'] = $this->PairingsModel->getPairings();
        $data['msg'] = 'Superpower pairing added.';
        
        $this->response($this->json($data), 200);
    }
    
    /**
     * This function deletes a hero, power, and pairing
     */
    public function delete()
    {
        //only allow POST method
        if($this->getRequestMethod() != "DELETE") {
            $this->response('',406);
        }
        
        $pairing = $this->_request['pairing'];
        
        //delete the hero
        $this->HeroesModel->deleteHero($pairing->heroId);
        
        //delete the power
        $this->PowersModel->deletePower($pairing->powerId);
        
        //delete the pairing
        $this->PairingsModel->deletePairing($pairing->id);
    }
    
    /**
     * This method edits a superpower pairing to the db.
     */
    public function edit()
    {
        //only allow PUT method
        if($this->getRequestMethod() != "PUT") {
            $this->response('',406);
        }
        
        $pairing = $this->_request['pairing'];
        
        //edit the hero
        $heroId = $this->HeroesModel->editHero($pairing->name, $pairing->heroId);
        
        //edit the power
        $powerId = $this->PowersModel->editPower($pairing->power, $pairing->powerId);
    }
    
    //Encode array into JSON
    private function json($data)
    {
        if(is_array($data)) {
            return json_encode($data);
        }
    }
}
?>