<?php 

class Database{
    private static $pdo=null;

    public static function connect(){
        if(self::$pdo==null){
            $config=require __DIR__.'/../config/config.php';
            try{
                self::$pdo = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_pass'],[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            }catch(PDOException $e){
                die("Database connection failed" . $e->getMessage());
            }
        }return self::$pdo;
    }
}