USE pdo_project;

-- Create the grocery_items table
CREATE TABLE IF NOT EXISTS grocery_items (
    item_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL UNIQUE,
    quantity INT(11) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some sample data
INSERT INTO grocery_items (item_name, quantity, price) VALUES 
('Milk (Gallon)', 10, 4.50),
('Eggs (Dozen)', 24, 3.25),
('Bread (Wheat)', 50, 2.99),
('Apples (Bag)', 15, 5.99);
