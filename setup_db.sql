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

CREATE TABLE IF NOT EXISTS project_media (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    file_url VARCHAR(255) NOT NULL,
    file_type ENUM('image', 'video') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);

-- Default Admin Account
-- Recommended: Run setup.php in your browser to create the admin account securely using PHP's password_hash().
-- Alternatively, if you must use SQL directly, ensure you use a valid Bcrypt hash.
-- INSERT IGNORE INTO admins (username, password) VALUES ('admin_dejj', '[HASH_GENERATED_BY_PHP]');

-- Sample Projects
INSERT IGNORE INTO projects (title, location, description, category, image_url) VALUES 
('Hydrogeological survey', 'Betheny High School', 'Comprehensive geological assessment for water resource management.', 'Hydro-Survey', 'Images/photo_2026-02-10_13-24-24.jpg'),
('Borehole Drilling', 'Akabaare, Kiruhura', 'Installation of permanent casings and drilling for sustainable water supply.', 'Drilling', 'Images/photo_2026-02-10_13-30-40.jpg'),
('Permanent Casings Installation', 'Mbale', 'Civil works and casing installation for deep well stability.', 'Engineering', 'Images/photo_2026-02-14_17-33-13.jpg');
