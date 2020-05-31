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
    private $_member;

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
                                $pgender = "male",
                                $member = "regular")
    {
        $this->setFname($fname);
        $this->setLname($lname);
        $this->setAge($age);
        $this->setGender($gender);
        $this->setPhone($phone);
        $this->setPname($pname);
        $this->setPage($page);
        $this->setPgender($pgender);
        $this->setMember($member);
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param mixed $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }

    /**
     * @return mixed
     */
    public function getPname()
    {
        return $this->_pname;
    }

    /**
     * @param mixed $pname
     */
    public function setPname($pname)
    {
        $this->_pname = $pname;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->_page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->_page = $page;
    }

    /**
     * @return mixed
     */
    public function getPgender()
    {
        return $this->_pgender;
    }

    /**
     * @param mixed $pgender
     */
    public function setPgender($pgender)
    {
        $this->_pgender = $pgender;
    }

    /**
     * @param mixed $member
     */
    public function setMember($member)
    {
        $this->_pgender = $member;
    }

    /**
     * @return member
     */
    public function getMember()
    {
        return $this->_member;
    }
}