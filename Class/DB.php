<?php


class PDOCommands
{
    
  private $dbh;

  public function __construct(){
    $this->dbh = new PDO('mysql:host=localhost;dbname=prof_and_students', 'root', '');
    $this->dbh->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $this->dbh->setAttribute(PDO::ERRMODE_EXCEPTION, true);
  }

  public function query($q, ...$params)
  {
    $stmt = $this->dbh->prepare($q);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);    
  }
  public static function get_rows($q, ...$params)
  {
    $stmt = (new PDOCommands())->dbh->prepare($q);
    $stmt->execute($params);
    $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($ret == false)
    {
      return [];
    }
    else
    {
      return $ret;
    }
  }

  public static function get_row($q, ...$params)
  {
    $stmt = (new PDOCommands())->dbh->prepare($q);
    $stmt->execute($params);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($data !== false && count($data) > 0)
    {
      if(isset($data[1]) != NULL)
      {
        $data = $data[0];
      }
      return $data;
    }
    else
      return null;
  }
    public static function update_row($q,...$params){
        try {
            $stmt = (new PDOCommands())->dbh->prepare($q);
            
        $stmt->execute($params);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return $th;
        }
        
    }

  
  
}


