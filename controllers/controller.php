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
                    $user = new PremiumMember();
                }
                else {
                    $user = new Member();
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

    /**
     * Process the profile route
     */
    public function profile()
    {
        $state = getStates();
        $seeks = getGender();

        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_SESSION['user']);

            if(!$this->_validator->validEmail($_POST['email'])) {
                $this->_f3->set('errors["email"]', "Invalid email");
            }

            if (empty($this->_f3->get('errors'))) {
                //Store the data in the session array
                $_SESSION['user']->setEmail($_POST['email']);
                $_SESSION['user']->setState($_POST['state']);
                $_SESSION['user']->setSeeking($_POST['seek']);
                $_SESSION['user']->setBio($_POST['bio']);

                if($_SESSION['user'] instanceOf PremiumMember) {
                    //Redirect to interests page
                    $this->_f3->reroute('/interests');
                }
                else{
                    //Redirect to summary page
                    $this->_f3->reroute('/summary');
                }
            }
        }

        $this->_f3->set('selected', $_POST['state']);
        $this->_f3->set('selectedSeek', $_POST['seek']);
        $this->_f3->set('email', $_POST['email']);
        $this->_f3->set('bio', $_POST['bio']);
        $this->_f3->set('seeks', $seeks);
        $this->_f3->set('state', $state);

        $view = new Template();
        echo $view->render('views/profile.html');
    }

    /**
     * Process the interest route
     */
    public function interests()
    {
        $indoor = getInDoor();
        $outdoor = getOutDoor();

        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);

            if(!$this->_validator->validOutdoor($_POST['outdoor'])) {
                $this->_f3->set('errors["outdoor"]', "Select out-door activity(s)");
            }
            if(!$this->_validator->validIndoor($_POST['indoor'])) {
                $this->_f3->set('errors["indoor"]', "Select in-door activity(s)");
            }

            if (empty($this->_f3->get('errors'))) {
                //Store the data in the session array
                $_SESSION['user']->setInDoorInterests($_POST['indoor']);
                $_SESSION['user']->setOutDoorInterests($_POST['outdoor']);

                //Redirect to summary page
                $this->_f3->reroute('/summary');
            }
        }

        $this->_f3->set('selectedIn', $_POST['indoor']);
        $this->_f3->set('selectedOut', $_POST['outdoor']);
        $this->_f3->set('indoor', $indoor);
        $this->_f3->set('outdoor', $outdoor);

        $view = new Template();
        echo $view->render('views/interests.html');
    }

    /**
     * Process the summary route
     */
    public function summary()
    {
        //var_dump($_SESSION);
        //echo "Thank You!";
        //echo "<p>" . $_SESSION['pet'] . $_SESSION['pets'] . "</p>";

        $view = new Template();
        echo $view->render('views/summary.html');
        session_destroy();
    }
}