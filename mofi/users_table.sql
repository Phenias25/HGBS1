-- SQL to create a robust users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  name VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Insert sample user (password is md5('admin123'))
INSERT INTO users (email, password, name) VALUES ('admin123@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'Admin User');
