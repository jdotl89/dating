<?php

class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;


    public function __construct($fname = "jon", $lname = "doe", $age = "20", $gender = "male", $phone = "342-206-5098", $pname = "fido", $page = "7", $pgender = "male")
    {
        parent::__construct($fname, $lname, $age, $gender, $phone, $pname, $page, $pgender);
    }

    /**
     * @return $this _inDoorInterests
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param $inDoorInterests sets the value
     * to $this _inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return $this _OutDoorInterests
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param $outDoorInterests sets the value
     * to $this _outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }
}