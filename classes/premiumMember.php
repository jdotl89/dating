<?php

class premiumMember extends member
{
    private $_member;
    private $_inDoorInterests;
    private $_outDoorInterests;

public function __construct($fname = "jon", $lname = "doe", $age = "20", $gender = "male", $phone = "342-206-5098", $pname = "fido", $page = "7", $pgender = "male", $member = "regular")
{
    parent::__construct($fname, $lname, $age, $gender, $phone, $pname, $page, $pgender, $member);
    $this->_member = "premium";
}

    /**
     * @return mixed
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param mixed $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param mixed $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }

    /**
     * @return member
     */
    public function getMember()
    {
        return $this->_member;
    }

}