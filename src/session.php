<?php


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Session {
    public function __construct(public string $username, public string $role)
    {
        
    }
}

class SessionManager{
    public static string $SECRET_KEY = 'jarankepang';
    public static function login(string $username, string $password): bool
    {
        if ($username == 'ghof' && $password == 'ghof'){
           
            $payload = [
                'username' => $username,
                'role' => 'customer'
            ];
           $jwt = JWT::encode($payload,self::$SECRET_KEY,'HS256');

           setcookie('GG-JWT', $jwt);


            return true;
        } else{
            return false;
        }
    }

    public static function getCurrentSession(): Session
    {
        if ($_COOKIE['GG-JWT']){
            $jwt = $_COOKIE['GG-JWT'];
              
            try{
                $payload = JWT::decode($jwt, new Key(self::$SECRET_KEY, 'HS256'));
                
                return new Session(username: $payload->username, role:$payload->role);
               } catch (Exception $e){
                
                throw new Exception('user not login');
           }
       
         } else {
            throw new Exception('user not login');
         }
    }


}