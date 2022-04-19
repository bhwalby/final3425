<?php
function connectDB() {
  $config = parse_ini_file("db.ini");
  $dbh = new PDO($config['dsn'], $config['username'], $config['password']);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

function authenticateStudent($user, $passwd) {
  try {
    $dbh = connectDB();
    $statement = $dbh->prepare("Select count(*) FROM student ".
                               "where username = :username and password = sha2(:passwd,256) ");
    $statement->bindParam(":username", $user);
    $statement->bindParam(":passwd", $passwd);
    $result = $statement->execute();
    $row=$statement->fetch();
    $dbh=null;

    return $row[0];
  }catch (PDOException $e) {
    print "Error!" . $e->getMessage() . "<br/>";
    die();
  }
}
function authenticateInstructor($user, $passwd) {
    try {
      $dbh = connectDB();
      $statement = $dbh->prepare("Select count(*) FROM instructor ".
                                 "where username = :username and password = sha2(:passwd,256) ");
      $statement->bindParam(":username", $user);
      $statement->bindParam(":passwd", $passwd);
      $result = $statement->execute();
      $row=$statement->fetch();
      $dbh=null;
  
      return $row[0];
    }catch (PDOException $e) {
      print "Error!" . $e->getMessage() . "<br/>";
      die();
    }
  }
?>