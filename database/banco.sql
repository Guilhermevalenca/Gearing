DROP DATABASE GEARING;
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
    user_controller BOOLEAN,
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
