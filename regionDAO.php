<?php
class RegionDAO
{
    private $_db = null;

    private $_region = null;

    // 1 seul constructeur en php
    public function __construct()
    {
        $this->_db = new Db();
    }

    public function listRegion()
    {
        $strQuery = "select * from Regions";
        return $this->queryRegion($strQuery);
    }

    public function Create(Region $region)
    {
        $this->_db->query("insert into Region (Nom) values (:n)");
        $this->_db->bind("n", $usr->Nom());
        $ret = $this->_db->execute();
    }  
    public function Update(Region $region)
    {
        $this->_db->query("update region set Nom= :n");
        $this->_db->bind("n", $usr->Nom());
        $ret = $this->_db->execute();
        return $ret;
    }


    private function Delete($query, $param)
    {
        $db = new db();
        $db->query($query);
        $db->bind("d", $param);
        $ret = $db->execute();
        return $ret;
    }
}
