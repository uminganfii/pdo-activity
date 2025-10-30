<?php
// read_methods.php
require_once 'dbconfig.php'; // Keep this connection file

echo "<h1>PDO Read Methods Demonstration (Grocery Items)</h1>";

// --- FETCHALL() METHOD ---
echo "<h2>1. Using fetchAll() (Retrieves ALL results at once)</h2>";
try {
    // Select data from the NEW table and columns
    $stmt_all = $pdo->prepare("SELECT item_id, item_name, quantity, price FROM grocery_items LIMIT 3");
    $stmt_all->execute();
    $items_all = $stmt_all->fetchAll();

    if ($items_all) {
        echo "<p>Total records retrieved: " . count($items_all) . "</p>";
        echo "<pre>";
        print_r($items_all);
        echo "</pre>"; // Submission Item 3
    } else {
        echo "<p>No records found for fetchAll().</p>";
    }
} catch (PDOException $e) {
    echo "<p>fetchAll() Error: " . $e->getMessage() . "</p>";
}

// --- FETCH() METHOD ---
echo "<h2>2. Using fetch() in a loop (Retrieves ONE result at a time)</h2>";
try {
    // Select data from the NEW table and columns
    $stmt_one = $pdo->prepare("SELECT item_name, price FROM grocery_items ORDER BY item_id DESC LIMIT 3");
    $stmt_one->execute();
    
    echo "<ul>";
    while ($item = $stmt_one->fetch()) {
        // Display the results directly (Submission Item 4)
        echo "<li>Item: " . htmlspecialchars($item['item_name']) . ", Price: $" . htmlspecialchars($item['price']) . "</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "<p>fetch() Error: " . $e->getMessage() . "</p>";
}
?>