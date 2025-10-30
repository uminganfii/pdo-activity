<?php
// crud_operations.php
require_once 'dbconfig.php';

echo "<h1>PDO CRUD Operations Demonstration (Grocery Items)</h1>";

try {
    // --- 1. CREATE (INSERT) OPERATION ---
    echo "<h2>1. INSERT Operation (Submission Item 5)</h2>";
    $new_item = 'Cereal (Box)';
    $new_qty = 30;
    $new_price = 4.99;
    
    $sql_insert = "INSERT INTO grocery_items (item_name, quantity, price) VALUES (:item, :qty, :price)";
    $stmt_insert = $pdo->prepare($sql_insert);
    $stmt_insert->execute([
        'item' => $new_item,
        'qty' => $new_qty,
        'price' => $new_price
    ]);
    
    if ($stmt_insert->rowCount() > 0) {
        echo "<p style='color: green;'>✅ **INSERT SUCCESSFUL:** Added item **" . $new_item . "**.</p>";
    } else {
        echo "<p style='color: red;'>❌ INSERT FAILED.</p>";
    }

    // --- 2. UPDATE OPERATION ---
    echo "<h2>2. UPDATE Operation (Submission Item 6)</h2>";
    $item_to_update = 'Cereal (Box)'; 
    $new_price_updated = 3.99; // Price drop!
    
    $sql_update = "UPDATE grocery_items SET price = :new_price WHERE item_name = :item";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->execute([
        'new_price' => $new_price_updated,
        'item' => $item_to_update
    ]);
    
    if ($stmt_update->rowCount() > 0) {
        echo "<p style='color: green;'>✅ **UPDATE SUCCESSFUL:** Changed **" . $item_to_update . "** price to **$" . $new_price_updated . "**.</p>";
    } else {
        echo "<p style='color: orange;'>⚠️ UPDATE SKIPPED: Item **" . $item_to_update . "** not found.</p>";
    }

    // --- 3. DELETE OPERATION ---
    echo "<h2>3. DELETE Operation (Submission Item 7)</h2>";
    $item_to_delete = 'Cereal (Box)'; 
    
    $sql_delete = "DELETE FROM grocery_items WHERE item_name = :item";
    $stmt_delete = $pdo->prepare($sql_delete);
    $stmt_delete->execute([
        'item' => $item_to_delete
    ]);
    
    if ($stmt_delete->rowCount() > 0) {
        echo "<p style='color: green;'>✅ **DELETE SUCCESSFUL:** Removed item **" . $item_to_delete . "**.</p>";
    } else {
        echo "<p style='color: orange;'>⚠️ DELETE SKIPPED: Item **" . $item_to_delete . "** was not found.</p>";
    }

} catch (PDOException $e) {
    echo "<h2 style='color: red;'>❌ CRUD Operation Error:</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>