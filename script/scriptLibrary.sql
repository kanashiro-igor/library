CREATE DATABASE IF NOT EXISTS db_library DEFAULT CHARACTER SET utf8mb4;
USE db_library;

DROP TABLE IF EXISTS db_library.tb_borrowed;

CREATE TABLE db_library.tb_borrowed (
idborrow INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
idbook INT NOT NULL,
desname VARCHAR(128) NOT NULL,
dtregister TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
dtreturn DATE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

DROP TABLE IF EXISTS db_library.tb_books;

CREATE TABLE db_library.tb_books (
idbook INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
destitle VARCHAR(64) NOT NULL,
desauthor VARCHAR(64) NOT NULL,
descategory VARCHAR(64) NOT NULL,
dtregister TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
status TINYINT NOT NULL DEFAULT '0'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

DROP TABLE IF EXISTS db_library.tb_user;

CREATE TABLE db_library.tb_user (
iduser INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
deslogin VARCHAR (64) NOT NULL,
despassword VARCHAR(256) NOT NULL,
dtregister TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO db_library.tb_user (deslogin, despassword) VALUES ('admin', 'admin');

DELIMITER ;;
CREATE PROCEDURE `sp_book_save`(
pdestitle VARCHAR(64), 
pdesauthor VARCHAR(64), 
pdescategory VARCHAR(64)
)
BEGIN
    
	INSERT INTO tb_books (destitle, desauthor, descategory) VALUES(pdestitle, pdesauthor, pdescategory);
	SELECT * FROM tb_books ORDER BY idbook;
    
END
DELIMITER ;

DELIMITER ;;
CREATE PROCEDURE `sp_borrowed_save`(
pidbook INT,
pdesname VARCHAR (64),
pdtreturn DATE
)
BEGIN
	
    UPDATE tb_books SET status = 1 WHERE idbook = pidbook;
    
    INSERT INTO tb_borrowed (idbook, desname, dtreturn) VALUES (pidbook, pdesname, pdtreturn);
    
END
DELIMITER ;

DELIMITER ;;
CREATE PROCEDURE `sp_delete_borrowed`(
pidbook INT
)
BEGIN
	
    DELETE FROM tb_borrowed WHERE idbook = pidbook;
    
    UPDATE tb_books SET status = 0 WHERE idbook = pidbook;
    
END
DELIMITER ;
