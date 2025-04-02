create database Sito;
use Sito;


CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       fullname VARCHAR(100) NOT NULL,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE cart (
                      idd INT AUTO_INCREMENT PRIMARY KEY,
                      user_id INT NOT NULL,
                      total_amount DECIMAL(10, 2) NOT NULL,
                      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                      FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE cart_items (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            cart_id INT NOT NULL,
                            product_id INT NOT NULL,
                            product_name VARCHAR(100) NOT NULL,
                            quantity INT NOT NULL,
                            price DECIMAL(10, 2) NOT NULL,
                            FOREIGN KEY (cart_id) REFERENCES cart(idd) ON DELETE CASCADE,
                            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE products (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(100) NOT NULL,
                          price DECIMAL(10, 2) NOT NULL,
                          stock INT NOT NULL
);


INSERT INTO products (id, name, price, stock) VALUES
                                                  (1, 'Felpa Nike Rossa', 60.00, 100),
                                                  (2, 'Felpa Nike Nera', 60.00, 100),
                                                  (3, 'Felpa Nike Blu', 55.00, 100),
                                                  (4, 'Felpa Nike Verde', 70.00, 100),
                                                  (5, 'Pantaloni Nike Neri', 50.00, 100),
                                                  (6, 'Pantaloni Nike Grigi', 45.00, 100),
                                                  (7, 'Nike Tech Pantaloni', 80.00, 100),
                                                  (8, 'Nike AF1', 100.00, 100),
                                                  (9, 'Nike ZM', 110.00, 100),
                                                  (10, 'Calze Nike', 15.00, 100),
                                                  (11, '3 Mutande Nike', 30.00, 100),
                                                  (12, 'Nike Mercurial blu', 180.00, 100),
                                                  (13, 'Nike Mercurial bianche', 180.00, 100),
                                                  (14, 'Nike Toni Kross', 250.00, 100);


select *  from cart;

ALTER TABLE cart_items DROP FOREIGN KEY cart_items_ibfk_2;
DROP TABLE cart_items;
DROP TABLE cart;

-- Nuova struttura semplificata
CREATE TABLE cart (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                      user_id INT NOT NULL,
                      product_id INT NOT NULL,
                      quantity INT NOT NULL DEFAULT 1,
                      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                      FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
                      FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE orders (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        user_id INT NOT NULL,
                        total_amount DECIMAL(10,2) NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE order_items (
                             id INT AUTO_INCREMENT PRIMARY KEY,
                             order_id INT NOT NULL,
                             product_id INT NOT NULL,
                             quantity INT NOT NULL,
                             price DECIMAL(10,2) NOT NULL,
                             FOREIGN KEY (order_id) REFERENCES orders(id),
                             FOREIGN KEY (product_id) REFERENCES products(id)
);

select * from cart;

select * from orders;