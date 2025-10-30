<?php
// render_table.php
require_once 'dbconfig.php';

echo "<h1>Submission Item 8: Rendered Grocery Item Table</h1>";

try {
    // Select all data from the grocery_items table
    $sql_select = "SELECT item_id, item_name, quantity, price, date_added FROM grocery_items";
    $stmt = $pdo->prepare($sql_select);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($items) {
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        
        // --- Table Header ---
        echo "<thead><tr>";
        foreach (array_keys($items[0]) as $key) {
            echo "<th>" . strtoupper(str_replace('_', ' ', $key)) . "</th>";
        }
        echo "</tr></thead>";
        
        // --- Table Body ---
        echo "<tbody>";
        foreach ($items as $row) {
            echo "<tr>";
            foreach ($row as $key => $data) {
                // Format price data with a dollar sign
                if ($key === 'price') {
                    echo "<td>$" . htmlspecialchars($data) . "</td>";
                } else {
                    echo "<td>" . htmlspecialchars($data) . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        
    } else {
        echo "<p>No remaining grocery items found in the database.</p>";
    }

} catch (PDOException $e) {
    echo "<h2 style='color: red;'>❌ Database Error:</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>