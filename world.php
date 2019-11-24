<?php 

$host = getenv('IP');
$username = 'Domonique_E';
$password = 'Info2180-lab7';
$dbname = 'world';

$country= $_GET['country']; 
$city= $_GET['city']; 

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'"); 
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); 


$stmt2 = $conn->query("SELECT c.district as district, c.name as city, c.country_code, cs.name as country, c.population as population 
FROM cities c join countries cs on c.country_code=cs.code WHERE cs.name='%$context%'");
$context=$stmt2->fetchAll(PDO::FETCH_ASSOC);

?>  

<?php if(!(isset($_GET['context']))):?>
<table style="border:1px solid black">
    <tr>
        <th>Country Name</th>
        <th>Continent</th> 
        <th>Independence</th>
        <th>Head of State</th>
    </tr> 
<tbody>
<?php foreach($results as $row): ?>
  <tr>
      <td><?=$row['name']?></td> 
      <td><?=$row['continent']?></td>
      <td><?=$row['independence_year']?></td>
      <td><?=$row['head_of_state']?></td>
  </tr>
<?php endforeach; ?>  
</tbody>
</table>  

<?php else : ?> 

<table style= "border:1px solid black">
    <tr> 
      <th>Name</th> 
      <th>District</th> 
     <th>Population</th>
   </tr>  
 <tbody>
<?php foreach ($context as $row): ?>
    <tr>
        <td><?=$row['city']?></td>
        <td><?=$row['district']?></td>
        <td><?=$row['population']?></td>
    </tr>
<?php endforeach; ?> 
</tbody>
</table> 
<?php endif; ?>
