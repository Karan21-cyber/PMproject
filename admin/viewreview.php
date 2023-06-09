<?php
include("../db/connection.php");

echo "<div class='user-container'>";
echo "<table>";
echo "<tr>
        <th>S.No</th>
        <th>User Name</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Rating</th>
        <th>Reviews</th>
        </tr>";

$count = 0;
//writing the sql query
$sql = "SELECT u.*,r.*,p.* 
        FROM REVIEW r
        JOIN USER_I u ON r.USER_ID = u.USER_ID 
        JOIN PRODUCT p ON r.PRODUCT_ID = p.PRODUCT_ID"; // selecting the all data from the user

$stid = oci_parse($connection, $sql);
oci_execute($stid);

while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
    $count += 1;
    $user_name = $row['FIRST_NAME'] . " " . $row['LAST_NAME'];
    $product_image = $row['PRODUCT_IMAGE'];
    $product_name = $row['PRODUCT_NAME'];

    echo "<tr>";
    echo "<td>" . $count . "</td>";
    echo "<td>" . ucfirst($user_name) . "</td>";
    echo "<td>" . ucfirst($product_name) . "</td>";
    echo "<td class='imgs'><img src=\"../db/uploads/products/" . $product_image . "\" alt=" . $row['PRODUCT_NAME'] . " ></td>";
    if (!empty($row['RATING'])) {
        echo "<td>" . $row['RATING'] . " </td>";
    } else {
        echo "<td>-</td>";
    }
    if (!empty($row['REVIEW_DESCRIPTION'])) {
        echo "<td>" . $row['REVIEW_DESCRIPTION'] . " </td>";
    } else {
        echo "<td>-</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo "</div>";
