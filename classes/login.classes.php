<?php 
    class SignIn extends Dbh {

        // Checking a User already Exist's in DataBase or Not
        protected function getUser($uid, $psd) {
            $sql = 'SELECT upsd FROM users WHERE uemail = ? OR userId = ?;';
            $stmt = $this->connect()->prepare($sql);

            // Existence of User with provided email or Registration No.
            if(!$stmt->execute([$uid, $uid])){
                $stmt = null;
                header("location: ../index.php?error = stmtfailed");
                exit();
            }
            
            // Existence of User with provided email or Registration No.
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=userNotFound01");
                exit();
            }

            $psdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPsd = password_verify($psd, $psdHashed[0]["upsd"]);
            

            if($checkPsd == false){
                $stmt = null;
                header("location: ..../index.php?error=Credential Error!");
                exit();
            }
            elseif($checkPsd == true){
                $sql = 'SELECT * FROM users WHERE (uemail = ? OR userId = ?) AND upsd = ?;';
                $stmt = $this->connect()->prepare($sql);

                if(!$stmt->execute([$uid, $uid, $psdHashed[0]["upsd"]])){
                    $stmt = null;
                    header("location: ../index.php?error = stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: ../index.php?error=userNotFound02");
                    exit();
                }
                // Fetching All the data from Users Table
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION['userId'] = $user[0]["userId"];
                echo $_SESSION['userId'];
            }


            $stmt = null;
        }
    }
?>