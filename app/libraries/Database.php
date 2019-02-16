<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/10/2019
 * Time: 10:34 AM
 */

class Database
{

  private $DataSourceName = "mysql:host=".ServerName.";dbname=".DbName;
  private $DatabaseHandler;
  public  $stmt;
  private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ];

  public function __construct()
  {
      try{
        $this->DatabaseHandler = new PDO($this->DataSourceName,UserName,Password,$this->options);
        if($this->DatabaseHandler) echo "connected successfully";
    }
    catch (PDOException $e){
          echo $e->getMessage();
    }
  }

  public function query($query) {
      $this->stmt = $this->DatabaseHandler->prepare($query);
  }

  public function bind($placeholder,$variable,$type = ''){
        if(is_int($variable))
            $type = PDO::PARAM_INT;
        else if(is_string($variable))
            $type = PDO::PARAM_STR;
        else if(is_bool($variable))
            $type = PDO::PARAM_BOOL;
        $this->stmt->bindValue($placeholder,$variable,$type);

  }



  public function execute()
  {
      try {
          return $this->stmt->execute();
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
  }

  public function fetchAll(){
      $this->execute();
      return $this->stmt->fetchAll();
  }

  public function fetchSingle(){
      $this->execute();
      return $this->stmt->fetch();
  }

  public function rowCount(){
      return $this->stmt->rowCount();
  }

}