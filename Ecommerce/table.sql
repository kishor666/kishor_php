CREATE TABLE IF NOT EXISTS category(
              id INT(10) AUTO_INCREMENT PRIMARY KEY,
              category_name VARCHAR(255) NOT NULL

       );


CREATE TABLE IF NOT EXISTS product(
       id INT(10) AUTO_INCREMENT PRIMARY KEY,
       category_id VARCHAR(255) NOT NULL,
       product_name VARCHAR(255) NOT NULL,
       qty VARCHAR(255) NOT NULL,
       rate VARCHAR(255) NOT NULL,
       product_image VARCHAR(255) NOT NULL,
       details TEXT(8000) NOT NULL

     );