CREATE TABLE IF NOT EXISTS User
(
    id_User      INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    email     VARCHAR(255) NOT NULL,
    firstName VARCHAR(255),
    lastName  VARCHAR(255),
    gender    CHAR(1)
);

CREATE TABLE IF NOT EXISTS Payments
(
    id_Payment INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date DATETIME,
    description TEXT,
    UserId INT NOT NULL,
    CONSTRAINT FK_PaymentsUser FOREIGN KEY (UserId) REFERENCES User(id_User)
);
