<?php 

    Class Dbh {

        protected function connect() {
            try {
                $host = '127.0.0.1:4001';
                $user = 'root';
                $password = "";
                $dbname = 'MoneyMan';

                // Setting Up DSN (Data Sournce Name)
                $dsn = 'mysql:host='.$host .';dbname='.$dbname;

                // Establishing / Getting A Connection
                $conn = new PDO($dsn, $user, $password);
                return $conn;
                // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
            catch (PDOException $e) {
                print "Error!: ". $e->getMessage(). "<br/>";
                die();
            }
        }

    }

    
    

    // if(mysqli_connect_errno()){
    //     echo "Database Connection Failed! Error: ".mysqli_connect_errno();
    // }
?>