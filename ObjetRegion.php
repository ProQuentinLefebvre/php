<?php 

class Region{
    private $_id = null;
    private $_nom = null;

    public function _construct($id, $nom){
        
        $this->setId($id);
        $this->setNom($nom);
    }

    public function setId($id){
        if (is_null($id)){
            return;
        }
        if (!is_numeric($id)) // S'il ne s'agit pas d'un integer
        {
            trigger_error('Id||L\'id doit être un entier', E_USER_NOTICE);
            return;
        }
        $this->_id = (int)$id;
    }
    public function Id(){
        return $this->_id;
    }

    public function setNom($nom){
        if (is_null($nom)){
            return;
        }
        if (!is_string($nom) || trim($nom)=="") // S'il ne s'agit pas d'une string
        {
            trigger_error('Name||Le nom est obligatoire', E_USER_NOTICE);
            return;
        }
        $this->_nom = trim($nom);
    }

    public function Nom(){
        return $this->_nom;
    }
}