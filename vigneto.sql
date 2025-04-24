CREATE database vigneto;
use vigneto;

CREATE TABLE utente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    prodotti_id INT NOT NULL,
    quantità INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES utente(id) ON DELETE CASCADE,
    FOREIGN KEY (prodotti_id) REFERENCES prodotti(id) ON DELETE CASCADE
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    totale DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES utente(id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantità INT NOT NULL,
    prezzo DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES prodotti(id)
);


CREATE TABLE prodotti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    descrizione TEXT,
    vintage YEAR, -- Annata del vino
    regione VARCHAR(100) -- Regione di provenienza del vino
);

INSERT INTO prodotti (nome, prezzo, stock, descrizione, vintage, regione) VALUES
    ('Chianti Classico', 20.00, 100, 'Vino rosso secco, con sapori di frutti rossi e spezie.', 2019, 'Toscana'),
    ('Barolo', 50.00, 50, 'Vino rosso robusto con sentori di ciliegie e tabacco.', 2017, 'Piemonte'),
    ('Prosecco', 15.00, 200, 'Vino bianco frizzante, fresco e leggero.', 2020, 'Veneto'),
    ('Brunello di Montalcino', 90.00, 30, 'Vino rosso potente e corposo, con note di ciliegia e cioccolato.', 2015, 'Toscana'),
    ('Frascati', 12.00, 150, 'Vino bianco fresco e fruttato, tipico del Lazio.', 2021, 'Lazio'),
    ('Nero d\'Avola', 18.00, 120, 'Vino rosso siciliano, corposo con sentori di frutti di bosco.', 2018, 'Sicilia'),
    ('Falanghina', 22.00, 80, 'Vino bianco fruttato con note di agrumi e fiori bianchi.', 2020, 'Campania'),
    ('Amarone della Valpolicella', 70.00, 60, 'Vino rosso strutturato, con sapori di frutta matura e spezie.', 2016, 'Veneto');
