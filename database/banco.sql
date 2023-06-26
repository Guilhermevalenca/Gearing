DROP DATABASE if exists GEARING;
CREATE DATABASE GEARING;
USE GEARING;

CREATE TABLE GEA_METHODOLOGY(
	meth_name VARCHAR(45) PRIMARY KEY NOT NULL,
    meth_description TEXT NOT NULL, /*TEXT attribute is from MySQL not SQL */
    meth_reference_style VARCHAR(45) NOT NULL
);
CREATE TABLE GEA_USER(
	user_email VARCHAR(700) PRIMARY KEY NOT NULL UNIQUE,
    user_name VARCHAR(45) NOT NULL,
    user_password TEXT NOT NULL,
    user_controller BOOLEAN NOT NULL,
    user_learning_style VARCHAR(45),
    user_meth_name VARCHAR(45),
    CONSTRAINT user_meth_name 
        FOREIGN KEY (user_meth_name) 
        REFERENCES GEA_METHODOLOGY(meth_name)
);
CREATE TABLE GEA_SCHEDULE(
	sche_title VARCHAR(45) NOT NULL,
    sche_shifts VARCHAR(10) NOT NULL,
    sche_user_email VARCHAR(700) NOT NULL,
    PRIMARY KEY (sche_title, sche_user_email),
    UNIQUE (sche_title, sche_user_email),
    CONSTRAINT sche_user_email 
        FOREIGN KEY (sche_user_email) 
        REFERENCES GEA_USER(user_email)
			ON DELETE CASCADE
            ON UPDATE CASCADE
);
CREATE TABLE GEA_SUBJECT(
    sub_id INT NOT NULL AUTO_INCREMENT,
    sub_name VARCHAR(30) NOT NULL,
    sub_day INT NOT NULL,
    sub_hour INT NOT NULL,
    sub_sche_title VARCHAR(45) NOT NULL,
    sub_sche_user_email VARCHAR(700) NOT NULL,
    PRIMARY KEY (sub_id,sub_sche_title,sub_sche_user_email),
    CONSTRAINT sub_sche_title__sub_sche_user_email 
        FOREIGN KEY (sub_sche_title, sub_sche_user_email) 
        REFERENCES GEA_SCHEDULE(sche_title, sche_user_email) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE
);
CREATE TABLE GEA_TOPIC(
    top_id INT NOT NULL AUTO_INCREMENT,
	top_title VARCHAR(45) NOT NULL UNIQUE,
    top_description TEXT NOT NULL,
    top_date DATETIME NOT NULL DEFAULT NOW(),
    top_user_email VARCHAR(700) NOT NULL,
    top_user_name VARCHAR(45) NOT NULL,
    PRIMARY KEY (top_id,top_title),
    CONSTRAINT top_user_email 
        FOREIGN KEY (top_user_email) 
        REFERENCES GEA_USER(user_email)
        ON UPDATE CASCADE
);
CREATE TABLE GEA_COMMENTS(
    com_id INT NOT NULL AUTO_INCREMENT,
	com_message TEXT NOT NULL,
    com_date DATETIME DEFAULT NOW(),
    com_user_name VARCHAR(45) NOT NULL,
    com_top_title VARCHAR(45) NOT NULL,
    com_user_email VARCHAR(700) NOT NULL,
    PRIMARY KEY (com_id, com_top_title, com_user_email),
    CONSTRAINT com_top_title  
        FOREIGN KEY (com_top_title) 
        REFERENCES GEA_TOPIC(top_title)
			ON UPDATE CASCADE,
    CONSTRAINT com_user_email 
        FOREIGN KEY (com_user_email)
        REFERENCES GEA_USER(user_email)
			ON UPDATE CASCADE
);
INSERT INTO GEA_USER (user_email,user_name,user_password,user_controller) VALUES 
('76d6e21195722bf570e3d0c243fcdd99ce5f5a40502add9a4e51a80bffaab361','gui','2282277651c82f8168b3f2d2b5115c4dc2c8b727775b2db258ceef690383ddf8',true),
('16abc8ead65b95d7328a1faed7997d7a1610be6e4a3f1e1accb9f660282bc004','nix','dcef48d3cd08c617a706eb6adb22fb05fef13893182e36e5c538d16cccb0a830',true),
('75647d0d8cabfd0a607b9c869e8856c698da014ff5ffc13627c77e0bba6a3b2c','gearing','e5a633926ae4c600f08b24758b61c60a3a2a806ac76c68ed6c00e5478b426fd7',true),
('820f91493f4dc1231647cc5a3e073c39a20c1078b04c853f65c59cef1c0e1da1','assíria','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',true);