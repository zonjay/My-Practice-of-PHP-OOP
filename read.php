<?php
include_once "config/database.php";
include_once "objects/product.php";
include_once 'config/core.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$stmt = $product->readAll($from_record_num, $records_per_page);
$total_rows=$product->countAll();
$num = $stmt->rowCount();

if($num > 0){
	echo "<table class='table table-bordered table-hover'>";
		echo "<tr>";
			echo "<th class='width-30-pct'>Name</th>";
			echo "<th class='width-30-pct'>Description</th>";
			echo "<th>Price</th>";
			echo "<th>Created</th>";
			echo "<th style='text-align:center;'>Action</th>";
		echo "</tr>";

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			echo "<tr>";
				echo "<td>{$name}</td>";
				echo "<td>{$description}</td>";
				echo "<td>{$price} dolloars</td>";
				echo "<td>{$created}</td>";
				echo "<td style='text-align:center;'>";
					echo "<div class='product-id display-none'>{$id}</div>";

					echo "<div class='btn btn-info edit-btn margin-right-1em'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</div>";

                    echo "<div class='btn btn-danger delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</div>";
				echo "</td>";
			echo "</tr>";
		}
	echo "</table>";
}

else{
	echo "<div class='alert alert-info'>No records found</div>";
}

include_once "pagination.php";
?>