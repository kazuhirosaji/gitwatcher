CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created DATETIME,
    updated DATETIME
);

CREATE TABLE repos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    user_id INT NOT NULL,
    url VARCHAR(255),
    language_id INT NOT NULL,
    created DATETIME,
    updated DATETIME
);

CREATE TABLE language (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    created DATETIME,
    updated DATETIME
);
