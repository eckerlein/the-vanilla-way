<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';
$pass = getenv('MYSQL_ROOT_PASSWORD');
$db = getenv('MYSQL_DATABASE');


// check the MySQL connection status
$conn = new mysqli($host, 'root', $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// var_dump($conn);
// select query
$sql = 'SELECT * FROM users';
$users = array();
if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->username . " " . $user->password;
    echo "<br>";
}

?>
