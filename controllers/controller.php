<?php
/**
 * Class Controller
 */
class Controller
{
    private $_f3; //router
    private $_validator; //validation object

    /**
     * Controller constructor.
     * @param $f3
     * @param $validator
     */
    public function __construct($f3, $validator)
    {
        $this->_f3 = $f3;
        $this->_validator = $validator;
    }

    /**
     * Display the default route
     */
    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * Process the personal route
     */
    public function personal()
    {
        $gender = getGender();
        //$f3->reroute('/profile');
        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);

            //valid person
            if(!$this->_validator->validName($_POST['first'])) {
                $this->_f3->set('errors["first"]', "Invalid first name");
            }
            if(!$this->_validator->validName($_POST['last'])) {
                $this->_f3->set('errors["last"]', "Invalid last name");
            }
            if(!$this->_validator->validAge($_POST['age'])) {
                $this->_f3->set('errors["age"]', "Invalid age");
            }
            if(!$this->_validator->validPhone($_POST['phone'])) {
                $this->_f3->set('errors["phone"]', "Invalid phone number");
            }

            // valid pet
            if(!$this->_validator->validName($_POST['petName'])) {
                $this->_f3->set('errors["petName"]', "Invalid pet name");
            }
            if(!$this->_validator->validAge($_POST['petAge'])) {
                $this->_f3->set('errors["petAge"]', "Invalid pet age");
            }

            //Data is valid
            if(empty($this->_f3->get('errors'))) {

                if(isset($_POST['premium'])){
                    $user = new premiumMember();
                }
                else {
                    $user = new member();
                }

                $user->setFname($_POST['first']);
                $user->setLname($_POST['last']);
                $user->setAge($_POST['age']);
                $user->setGender($_POST['gender']);
                $user->setPhone($_POST['phone']);
                $user->setPname($_POST['petName']);
                $user->setPage($_POST['petAge']);
                $user->setPgender($_POST['pGender']);

                //Store the data in the session array
                /*            $_SESSION['first'] = $_POST['first'];
                            $_SESSION['last'] = $_POST['last'];
                            $_SESSION['age'] = $_POST['age'];
                            $_SESSION['gender'] = $_POST['gender'];
                            $_SESSION['phone'] = $_POST['phone'];
                            $_SESSION['petName'] = $_POST['petName'];
                            $_SESSION['petAge'] = $_POST['petAge'];
                            $_SESSION['pGender'] = $_POST['pGender'];*/
                $_SESSION['user'] = $user;

                //Redirect to profile page
                $this->_f3->reroute('/profile');
            }
        }

        $this->_f3->set('first', $_POST['first']);
        $this->_f3->set('last', $_POST['last']);
        $this->_f3->set('age', $_POST['age']);
        $this->_f3->set('selectedPerson', $_POST['gender']);
        $this->_f3->set('phone', $_POST['phone']);
        $this->_f3->set('petName', $_POST['petName']);
        $this->_f3->set('petAge', $_POST['petAge']);
        $this->_f3->set('selectedPet', $_POST['pGender']);
        $this->_f3->set('gender', $gender);
        $this->_f3->set('pGender', $gender);

        $view = new Template();
        echo $view->render('views/personal.html');
    }
}