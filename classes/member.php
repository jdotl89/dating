<?php

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;
    private $_pname;
    private $_page;
    private $_pgender;

    /** Default constructor
     * @param string $fname
     * @param string $lname
     * @param string $age
     * @param string $gender
     * @param string $phone
     * @param string $pname
     * @param string $page
     * @param string $pgender
     * @param string $member
     */
    public function __construct($fname = "jon",
                                $lname = "doe",
                                $age = "20",
                                $gender = "male",
                                $phone = "342-206-5098",
                                $pname = "fido",
                                $page = "7",
                                $pgender = "male")
    {
        $this->setFname($fname);
        $this->setLname($lname);
        $this->setAge($age);
        $this->setGender($gender);
        $this->setPhone($phone);
        $this->setPname($pname);
        $this->setPage($page);
        $this->setPgender($pgender);
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param $fname sets the value
     * to $this _fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return $this _lname
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param $lname sets the value
     * to $this _lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return $this _age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param $age sets the value
     * to $this _age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return $this _gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param $gender sets the value
     * to $this _gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return $this _phone
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param $phone sets the value
     * to $this _phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return $this _email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param $email sets the value
     * to $this _email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return $this _state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param $state sets the value
     * to $this _state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return $this _seeking
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param $seeking sets the value
     * to $this _seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return $this _bio
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param $bio sets the value
     * to $this _bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }

    /**
     * @return $this _pname
     */
    public function getPname()
    {
        return $this->_pname;
    }

    /**
     * @param $Pname sets the value
     * to $this _Pname
     */
    public function setPname($pname)
    {
        $this->_pname = $pname;
    }

    /**
     * @return $this _page
     */
    public function getPage()
    {
        return $this->_page;
    }

    /**
     * @param $Page sets the value
     * to $this _Page
     */
    public function setPage($page)
    {
        $this->_page = $page;
    }

    /**
     * @return $this _pgender
     */
    public function getPgender()
    {
        return $this->_pgender;
    }

    /**
     * @param $pgender sets the value
     * to $this _pgender
     */
    public function setPgender($pgender)
    {
        $this->_pgender = $pgender;
    }
}