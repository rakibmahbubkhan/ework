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
    <title></title>
</head>
<body>

<div class="post top-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
            <?php
			    foreach ($rows as $row) {
                    
                    echo "<tr>
                    <div class='row post-pad'>
                    <div class='col-lg-9'>
                    <div class='title'>";
                    echo "<td>" . $row['title'] . "</td></div></div>";

                    echo "<td>
                    <div class='col-lg-3'>
                    <center>
                    <div class='budget'>$" .$row['price'] . "</td>";


                        echo "</td>";
                echo "</div><button class='btn btn-primary'><small>View Description</small></button></center></div></div><hr></tr>";
            }
        }
        ?>
                
                
                

            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
    
</body>
</html>
<?php
include $temp.'footer.php';
?>