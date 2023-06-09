CREATE TABLE GEA_METHODOLOGY(
	meth_name VARCHAR(45) PRIMARY KEY NOT NULL,
    meth_description VARCHAR(45) NOT NULL
);
CREATE TABLE GEA_USER(
	user_email VARCHAR(45) PRIMARY KEY NOT NULL,
    user_name VARCHAR(45) NOT NULL,
    user_password VARCHAR(45) NOT NULL,
    user_controller BOOLEAN,
    user_learning_style VARCHAR(45),
    user_meth_name VARCHAR(45),
    CONSTRAINT user_meth_name FOREIGN KEY (user_meth_name) REFERENCES GEA_METHODOLOGY(meth_name)
);
CREATE TABLE GEA_SCHEDULE(
	sche_title VARCHAR(45) NOT NULL,
    sche_shifts VARCHAR(10) NOT NULL,
    sche_user_email VARCHAR(45) NOT NULL,
    PRIMARY KEY (sche_title, sche_user_email),
    CONSTRAINT sche_user_email FOREIGN KEY (sche_user_email) REFERENCES GEA_USER(user_email)
);
CREATE TABLE GEA_SUBJECT(
    sub_id INT NOT NULL AUTO_INCREMENT,
    sub_name VARCHAR(30) NOT NULL,
    sub_day INT NOT NULL,
    sub_hour INT NOT NULL,
    sub_sche_title VARCHAR(45) NOT NULL,
    sub_sche_user_email VARCHAR(45) NOT NULL,
    PRIMARY KEY (sub_id,sub_sche_title,sub_sche_user_email),
    CONSTRAINT sub_sche_title FOREIGN KEY (sub_sche_title) REFERENCES GEA_SCHEDULE(sche_title),
    CONSTRAINT sub_sche_user_email FOREIGN KEY (sub_sche_user_email) REFERENCES GEA_SCHEDULE(sche_user_email) 
);
CREATE TABLE GEA_TOPIC(
	top_name VARCHAR(45) PRIMARY KEY NOT NULL,
    top_user_email VARCHAR(45) NOT NULL,
    CONSTRAINT top_user_email FOREIGN KEY (top_user_email) REFERENCES GEA_USER(user_email)
);
CREATE TABLE GEA_CHAT(
	chat_message VARCHAR(45) NOT NULL,
    chat_top_name VARCHAR(45) NOT NULL,
    chat_top_user_email VARCHAR(45) NOT NULL,
    PRIMARY KEY (chat_top_name, chat_top_user_email),
    CONSTRAINT chat_top_name FOREIGN KEY (chat_top_name) REFERENCES GEA_TOPIC(top_name),
    CONSTRAINT chat_top_user_email FOREIGN KEY (chat_top_user_email) REFERENCES GEA_TOPIC(top_user_email)
);
