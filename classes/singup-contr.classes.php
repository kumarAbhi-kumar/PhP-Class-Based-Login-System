<?php 

    // include('./signup.calsses.php');
    class SignUpContr extends SignUp{
        private $userName;
        private $regNo;
        private $psd;

        private $psd_repeat;
        private $email;


        public function __construct($userName, $regNo, $psd, $psd_repeat, $email){
            $this->userName = $userName;
            $this->regNo = $regNo;
            $this->psd = $psd;
            $this->psd_repeat = $psd_repeat;
            $this->email = $email;
        }

        public function signupUser(){
            if($this->emptyInput() == false){
                // Error Handlers for Empty Inputs
                header("location: ../index.php?error=emptyinput");
                exit();
            }
            elseif($this->invalidEmail() == false){
                // Error Handlers for Invalid Email
                header('location: ../index.php?error=InvalidEmail');
                exit();
            }
            elseif($this->psdMatch() == false){
                // Error Handlers for Password Not Matching
                header('location: ../index.php?error=MisMatch_Password');
                exit();
            }
            elseif($this->userMatch() == false){
                // Error Handlers for Existing User
                header('location: ../index.php?erro=UserAlreadyExists');
                exit();
            }
            else{
                $this->setUser($this->regNo, $this->userName, $this->email, $this->psd);
            }
        }

        // Validating For Empty Fields
        private function emptyInput(){
            $result = true;
            if(empty($this->userName) || empty($this->regNo) || empty($this->psd) || empty($this->psd_repeat) || empty($this->email)){
                $result = false;
            }
            return $result;
        }

        // Validating For Valid Email Address
        private function invalidEmail(){
            $result = true;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }
            return $result;
        }

        private function psdMatch(){
            $result = true;
            if( $this->psd !== $this->psd_repeat ){
                $result = false;
            }
            return $result;
        }

        private function userMatch() {
            $result = true;
            if(!$this->checkUser($this->email)){
                $result = false;
            }
            return $result;
        }

    }
?>