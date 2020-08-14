<?php
include 'init.php';

$statement = $con->prepare("SELECT * FROM jobs");
                $statement->execute();
                $rows = $statement->fetchAll();

                if (!empty($rows)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTS</title>
</head>
<body>
<section class="top-section"><br><br>
<div class="container">
    <h2>Posts</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
      <th>#ID</th>
      <th>TITLE </th>
      <th>DESCRIPTION </th>
      <th>BUDGET</th>
      <th>KEYWORDS</th>

      </tr>
    </thead>
    <tbody>
    <?php
			    foreach ($rows as $row) {
                    
                    echo "<tr>";
                    echo "<td>#" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>$" .$row['price'] . "</td>";
                    echo "<td><small>" . $row['keyword']  . "</small></td>";


                        echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
  </table>
</div>

</section>
</body>
</html>
<?php
include $temp.'footer.php';
?>