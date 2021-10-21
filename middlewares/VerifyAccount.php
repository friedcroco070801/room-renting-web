<?php
    namespace Middlewares;

    require_once('jwtGeneration.php');
    require_once('config.php');
    require_once('models/User.php');

    class VerifyAccount {
        public static function verifyAccount() {
            $headers = apache_request_headers();
            
            $token = null;
            
            if(isset($headers['Authorization'])) {
                if (!empty($headers['Authorization'])) {
                    if (preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
                        $token = $matches[1];
                    }
                }
            }

            if($token == null) return null;
            return isJwtValid($token);
        }
        
        public static function checkAuthState() {
            $userId = self::verifyAccount();
            if(!$userId) return null;
            $db = 'Database'::getInstance();
            $User = 'Models\\User';
            $query = "SELECT usr.* FROM user as usr WHERE userId=$userId";
            $account = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($account);
            if(!$row) return null;
            $row['email'] = '';
            $row['password'] = '';
            return $row;
        }

    }
    
?>