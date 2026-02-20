-- Database setup for Dejj Engineering
CREATE DATABASE IF NOT EXISTS dejj_engineering;
USE dejj_engineering;

-- Admins Table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Projects Table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inquiries Table
CREATE TABLE IF NOT EXISTS inquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT,
    status ENUM('pending', 'replied') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default Admin Account (Username: admin_dejj, Password: password123)
-- In a real app, you'd use password_hash() in PHP to generate this.
INSERT IGNORE INTO admins (username, password) VALUES ('admin_dejj', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Sample Projects
INSERT IGNORE INTO projects (title, location, description, category, image_url) VALUES 
('Hydrogeological survey', 'Betheny High School', 'Comprehensive geological assessment for water resource management.', 'Hydro-Survey', 'Images/photo_2026-02-10_13-24-24.jpg'),
('Borehole Drilling', 'Akabaare, Kiruhura', 'Installation of permanent casings and drilling for sustainable water supply.', 'Drilling', 'Images/photo_2026-02-10_13-30-40.jpg'),
('Permanent Casings Installation', 'Mbale', 'Civil works and casing installation for deep well stability.', 'Engineering', 'Images/photo_2026-02-14_17-33-13.jpg');
