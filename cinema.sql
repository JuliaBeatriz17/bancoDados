DROP DATABASE IF EXISTS cinema;
CREATE DATABASE IF NOT EXISTS cinema CHARSET=utf8 COLLATE=utf8_unicode_ci;
USE cinema;
CREATE TABLE filmes(id INT AUTO_INCREMENT PRIMARY KEY,
                    titulo VARCHAR(40) NOT NULL,
                    nota DECIMAL(9,1) NOT NULL,
                    UNIQUE INDEX idx_filmes__titulo(titulo)
                    )ENGINE=INNODB;
                    
INSERT INTO filmes(id,titulo,nota) VALUES(1,"O PROTETOR",8.1),
(2,"ESPOSA DE MENTIRINHA",7.5),
(3,"INTERESTELAR",9.3),
(4,"OS SEM FLORESTA",8.3),
(5,"O GRANDE TRUQUE",8.9);

SELECT * FROM filmes;