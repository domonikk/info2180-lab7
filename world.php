<?php
$host = getenv('IP');
$username = 'Domonique_E';
$password = 'Info2180_7';
$dbname = 'world';

$country=$_GET['country'];
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");  
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);  

 
?> 

<ul> 
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>