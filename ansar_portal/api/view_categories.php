<?php
// admin/php/view_categories.php
include ('db_connection.php');
include ('headers.php');

// Retrieve categories from the database
$selectQuery = "SELECT category_id, category_name, category_image FROM categories";
$result = $conn->query($selectQuery);

$categories = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = array(
            "category_id" => $row["category_id"],
            "category_name" => $row["category_name"],
            "category_image" => $row["category_image"]
        );
    }
}

// Close the database connection
$conn->close();

// Output JSON response
header('Content-Type: application/json');
echo json_encode($categories);
?>