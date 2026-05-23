CREATE DATABASE IF NOT EXISTS inventory;

USE inventory;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    sku VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    category_id INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    quantity INT DEFAULT 0,
    min_stock INT DEFAULT 5,
    image VARCHAR(255),
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (category_id)
        REFERENCES categories(id)
        ON DELETE CASCADE
);

CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    contact_person VARCHAR(255),
    phone VARCHAR(50),
    email VARCHAR(255) UNIQUE,
    address TEXT,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE product_supplier (
    product_id INT NOT NULL,
    supplier_id INT NOT NULL,

    PRIMARY KEY (product_id, supplier_id),

    FOREIGN KEY (product_id)
        REFERENCES products(id)
        ON DELETE CASCADE,

    FOREIGN KEY (supplier_id)
        REFERENCES suppliers(id)
        ON DELETE CASCADE
);

CREATE TABLE stock_movements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    type ENUM('IN','OUT') NOT NULL,
    quantity INT NOT NULL,
    remarks TEXT,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (product_id)
        REFERENCES products(id)
        ON DELETE CASCADE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','staff') DEFAULT 'staff',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO categories (name, created_at, updated_at) VALUES
('Electronics', NOW(), NOW()),
('Office Supplies', NOW(), NOW()),
('Furniture', NOW(), NOW()),
('School Supplies', NOW(), NOW()),
('Food & Beverages', NOW(), NOW()),
('Cleaning Materials', NOW(), NOW()),
('Medical Supplies', NOW(), NOW()),
('Computer Accessories', NOW(), NOW()),
('Home Appliances', NOW(), NOW()),
('Construction Materials', NOW(), NOW());

INSERT INTO suppliers (
    company_name,
    contact_person,
    phone,
    email,
    address,
    created_at,
    updated_at
) VALUES

(
'TechSource Trading',
'Juan Dela Cruz',
'09171234567',
'techsource@gmail.com',
'Cebu City, Philippines',
NOW(),
NOW()
),

(
'Prime Office Depot',
'Maria Santos',
'09181234567',
'primeoffice@gmail.com',
'Mandaue City, Philippines',
NOW(),
NOW()
),

(
'Furniture Hub',
'Carlo Reyes',
'09191234567',
'furniturehub@gmail.com',
'Lapu-Lapu City, Philippines',
NOW(),
NOW()
),

(
'EduSupply Center',
'Angela Lim',
'09201234567',
'edusupply@gmail.com',
'Talisay City, Philippines',
NOW(),
NOW()
),

(
'FreshMart Distributors',
'Kevin Tan',
'09211234567',
'freshmart@gmail.com',
'Cagayan de Oro, Philippines',
NOW(),
NOW()
),

(
'CleanPro Essentials',
'Sofia Garcia',
'09221234567',
'cleanpro@gmail.com',
'Davao City, Philippines',
NOW(),
NOW()
),

(
'MedLine Supply Co.',
'Mark Villanueva',
'09231234567',
'medline@gmail.com',
'Iloilo City, Philippines',
NOW(),
NOW()
),

(
'Accessory World',
'Jasmine Co',
'09241234567',
'accessoryworld@gmail.com',
'Bacolod City, Philippines',
NOW(),
NOW()
),

(
'HomeTech Appliances',
'Nathan Cruz',
'09251234567',
'hometech@gmail.com',
'General Santos City, Philippines',
NOW(),
NOW()
),

(
'BuildRight Materials',
'Patricia Ong',
'09261234567',
'buildright@gmail.com',
'Butuan City, Philippines',
NOW(),
NOW()
);

INSERT INTO products
(
    name,
    sku,
    description,
    category_id,
    unit_price,
    quantity,
    min_stock,
    image,
    created_at,
    updated_at
)

VALUES

-- ELECTRONICS
(
'Smartphone',
'ELX001',
'Android smartphone',
1,
12000,
15,
5,
'products/smartphone.jpg',
NOW(),
NOW()
),

(
'Bluetooth Speaker',
'ELX002',
'Portable bluetooth speaker',
1,
2500,
10,
3,
'products/speaker.jpg',
NOW(),
NOW()
),

-- OFFICE SUPPLIES
(
'Ballpen Box',
'OFF001',
'Blue ballpen set',
2,
150,
50,
10,
'products/ballpen.jpg',
NOW(),
NOW()
),

(
'Printer Paper',
'OFF002',
'A4 bond paper',
2,
220,
40,
10,
'products/paper.jpg',
NOW(),
NOW()
),

-- FURNITURE
(
'Office Chair',
'FUR001',
'Comfortable office chair',
3,
3500,
8,
2,
'products/chair.jpg',
NOW(),
NOW()
),

(
'Wooden Table',
'FUR002',
'Study table',
3,
5000,
5,
2,
'products/table.jpg',
NOW(),
NOW()
),

-- SCHOOL SUPPLIES
(
'Notebook',
'SCH001',
'200 pages notebook',
4,
45,
100,
20,
'products/notebook.jpg',
NOW(),
NOW()
),

(
'Crayons',
'SCH002',
'24 colors crayons',
4,
120,
30,
10,
'products/crayons.jpg',
NOW(),
NOW()
),

-- FOOD & BEVERAGES
(
'Instant Coffee',
'FOOD001',
'Coffee sachets',
5,
180,
25,
5,
'products/coffee.jpg',
NOW(),
NOW()
),

(
'Bottled Water',
'FOOD002',
'500ml bottled water',
5,
20,
200,
50,
'products/water.jpg',
NOW(),
NOW()
),

-- CLEANING MATERIALS
(
'Dishwashing Liquid',
'CLN001',
'1 liter dishwashing liquid',
6,
95,
20,
5,
'products/dishwashing.jpg',
NOW(),
NOW()
),

(
'Floor Cleaner',
'CLN002',
'Lavender floor cleaner',
6,
150,
15,
5,
'products/floorcleaner.jpg',
NOW(),
NOW()
),

-- MEDICAL SUPPLIES
(
'Face Mask',
'MED001',
'Disposable face masks',
7,
250,
100,
20,
'products/mask.jpg',
NOW(),
NOW()
),

(
'Alcohol',
'MED002',
'70% ethyl alcohol',
7,
85,
50,
10,
'products/alcohol.jpg',
NOW(),
NOW()
),

-- COMPUTER ACCESSORIES
(
'Gaming Mouse',
'COM001',
'RGB gaming mouse',
8,
750,
12,
3,
'products/mouse.jpg',
NOW(),
NOW()
),

(
'Mechanical Keyboard',
'COM002',
'Blue switch keyboard',
8,
2200,
7,
2,
'products/keyboard.jpg',
NOW(),
NOW()
),

-- HOME APPLIANCES
(
'Electric Fan',
'HOME001',
'Stand electric fan',
9,
1800,
9,
2,
'products/fan.jpg',
NOW(),
NOW()
),

(
'Rice Cooker',
'HOME002',
'1.8L rice cooker',
9,
2500,
6,
2,
'products/ricecooker.jpg',
NOW(),
NOW()
),

-- CONSTRUCTION MATERIALS
(
'Hammer',
'CON001',
'Heavy duty hammer',
10,
350,
18,
5,
'products/hammer.jpg',
NOW(),
NOW()
),

(
'Cement',
'CON002',
'40kg cement bag',
10,
280,
60,
15,
'products/cement.jpg',
NOW(),
NOW()
);
