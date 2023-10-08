<?php 

    // This is the page Where We Interact with the database
    

    class SignUp extends Dbh {

        // Checking a User already Exist's in DataBase or Not
        protected function checkUser($email) {
            $sql = 'SELECT uemail FROM users WHERE uemail = ?;';
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute([$email])){
                $stmt = null;
                header("location: ../index.php?error = stmtfailed");
                exit();
            }
            
            $resultCheck = true;
            if($stmt->rowCount() > 0){
                $resultCheck = false;
            }

            return $resultCheck;
        }

        protected function setUser($userId, $userName, $email, $psd){
            $sql = 'INSERT INTO users(userId, uname, uemail, upsd) VALUES(?, ?, ?, ?);';
            $stmt = $this->connect()->prepare($sql);
            $hashedPsd = password_hash($psd, PASSWORD_DEFAULT);
            if(!$stmt->execute([$userId, $userName, $email, $hashedPsd])){
                $stmt = null;
                header('location: ../index.php?error=signUpFailed');
            }
        }

    }
?>