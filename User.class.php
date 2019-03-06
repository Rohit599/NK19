<?php
/*
 * User Class
 * This class is used for database related (connect, insert, and update) operations
 * @author    CodexWorld.com
 * @url        http://www.codexworld.com
 * @license    http://www.codexworld.com/license
 */

class User
{
    private $dbHost     = DB_HOST;
    private $dbUsername = DB_USERNAME;
    private $dbPassword = DB_PASSWORD;
    private $dbName     = DB_NAME;
    private $userTbl    = DB_USER_TBL;
    
    function __construct()
    {
        if (!isset($this->db)) {
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Failed to connect with MySQL: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }
    
    function checkUser($userData = array())
    {
        if (!empty($userData)) {
            // Check whether user data already exists in the database
            $checkQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $checkResult = $this->db->query($checkQuery);
            if ($checkResult->num_rows > 0) {
                // Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = NOW() WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
                $sql="SELECT level FROM users WHERE email='".$userData['email']."'";
                $ulevel = $this->db->query($sql);
                if ($ulevel->num_rows > 0) {
                    // output data of each row
                    while ($row = $ulevel->fetch_assoc()) {
                        $user_level = $row["level"];
                    }
                }

                $_SESSION['user']=$userData['email'];
                echo"<script type='text/javascript'>
                window.location.href='level".$user_level.".php';
                </script>";
            } else {
                // Insert user data in the database
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = NOW(), modified = NOW()";
                $insert = $this->db->query($query);
                $_SESSION['user']=$userData['email'];
                echo"<script type='text/javascript'>
                window.location.href='home.php';
                </script>";
            }
            
            // Get user data from the database
            // $result = $this->db->query($checkQuery);
            // $userData = $result->fetch_assoc();
        } else {
            echo"<script type='text/javascript'>
        window.location.href='index.php';
        </script>";
        }
        
        // Return user data
        // return $userData;
    }
}
