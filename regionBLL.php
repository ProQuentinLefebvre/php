<?php
require_once "ObjetRegions.php";
require_once "regionDAO.php";

//CRUD Create-Read-Update-Delete
class RegionBLL
{
    private $_udal = null;

    public function __construct()
    {
        $this->_udal = new RegionDAO();
    }

    public function listRegion()
    {
        return $this->_udal->listRegion();
    }

    public function Create(Region $region)
    {
        if (empty(trim($region->Nom()))) {
            $this->_errors[] = "Nom is required";
        }
       
            }
        }

        return $this->_udal->Create($region);
    

    public function Update(Region $region)
    {
        if (empty(trim($usr->Nom()))) {
            $this->_errors[] = "Name is required";
        }
        
        }
