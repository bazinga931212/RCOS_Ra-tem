<!DOCTYPE>
<html>
<body>
<?php
/**
 * @Author: Zhiying
 * @Date:   2015-12-04 17:03:08
 * @Last Modified by:   Zhiying
 * @Last Modified time: 2015-12-06 22:22:21
 */
//I need to store course ID, course name, department name, semester, year, instructor, score
$alldata = array();
$courses = file_get_contents('http://yacs.me/api/4/courses/');
$courses = json_decode($courses, true);
$course = $courses["result"];
$courselist=array();
foreach ($course as $onecourse) {
  $tem = array();
  foreach ($onecourse as $category => $value) {
    if ($category==="id" || $category==="name" ){
      $tem[$category]=$value;
    }
  }
  array_push($courselist, $tem);
}
//below are the procedure of storing data
$dsn = 'mysql:host=localhost; dbname=rpi_course';
$username="root";
$password="001219158101";
try {
  $db=new PDO($dsn, $username, $password);

  $table="CREATE TABLE courses (
    id INT NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    score INT(3) NOT NULL
    )";
  if ($db->query($table)==TRUE) {
    echo "Table Created!";
  }
  else {
    echo "ERROR!";
  }
  $count=0;
  set_time_limit(6000);
  foreach ($courselist as $one) {
      $keys=array_keys($one);
      $courseid=$one[$keys[0]];
      $coursename=$one[$keys[1]];
      $query = "INSERT INTO courses(`id`, `name`, `score`)
                VALUES ('$courseid', '$coursename', 0)";
      $insert_count=$db->exec($query);
      $count+=1;
  }
  echo $count;
}
catch (PDOException $e) {
  print "Error:" . $e->getMessage() . "<br/>";
  die();
}
/*
foreach ($courselist as $a) {
  foreach ($a as $c => $v) {
    echo $c . ": " . $v;
    echo "<br>";
  }
}*/

?>
  </body>
  </html>
