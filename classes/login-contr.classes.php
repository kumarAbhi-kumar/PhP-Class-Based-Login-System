<?php 

    class loginContr extends SignIn{
        private $uid;
        private $psd;


        public function __construct($uid, $psd){
            $this->psd = $psd;
            $this->uid = $uid;
        }

        public function signinUser(){
            if($this->emptyInput() == false){
                // Error Handlers for Empty Inputs
                header("location: ../index.php?error=emptyinput");
                exit();
            }
            else{
                $this->getUser($this->uid, $this->psd);
            }
            
        }

        // Validating For Empty Fields
        private function emptyInput(){
            $result = true;
            if(empty($this->psd) || empty($this->uid)){
                $result = false;
            }
            return $result;
        }
    }
?>