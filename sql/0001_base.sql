CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL,
    password VARCHAR(40) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE (login)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

CREATE TABLE tasks (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;


create table if not exists `versions` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;