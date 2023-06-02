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
    meth_name VARCHAR(45),
    FOREIGN KEY (meth_name) REFERENCES GEA_METHODOLOGY(meth_name)
);
CREATE TABLE GEA_CRONOGRAM(
	cro_title VARCHAR(45) NOT NULL,
    cro_shifts VARCHAR(10) NOT NULL,
    user_email VARCHAR(45) NOT NULL,
    PRIMARY KEY (cro_title, user_email),
    FOREIGN KEY (user_email) REFERENCES GEA_USER(user_email)
);
CREATE TABLE GEA_MATTER(
    mat_id INT PRIMARY KEY NOT NULL,
    mat_name VARCHAR(30) NOT NULL,
    mat_day INT NOT NULL,
    mat_hour INT NOT NULL,
    cro_title VARCHAR(45) NOT NULL,
    FOREIGN KEY (cro_title) REFERENCES GEA_CRONOGRAM(cro_title)
);
CREATE TABLE GEA_TOPIC(
	top_name VARCHAR(45) PRIMARY KEY NOT NULL,
    user_email VARCHAR(45) NOT NULL,
    FOREIGN KEY (user_email) REFERENCES GEA_USER(user_email)
);
CREATE TABLE GEA_CHAT(
	chat_message VARCHAR(45) NOT NULL,
    top_name VARCHAR(45) NOT NULL,
    user_email VARCHAR(45) NOT NULL,
    PRIMARY KEY (top_name, user_email),
    FOREIGN KEY (top_name) REFERENCES GEA_TOPIC(top_name),
    FOREIGN KEY (user_email) REFERENCES GEA_USER(user_email)
);
