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
    CONSTRAINT user_meth_name FOREIGN KEY (user_meth_name) REFERENCES GEA_METHODOLOGY(meth_name)
);
CREATE TABLE GEA_SCHEDULE(
	sche_title VARCHAR(45) NOT NULL,
    sche_shifts VARCHAR(10) NOT NULL,
    sche_user_email VARCHAR(700) NOT NULL,
    PRIMARY KEY (sche_title, sche_user_email),
    UNIQUE (sche_title, sche_user_email),
    CONSTRAINT sche_user_email FOREIGN KEY (sche_user_email) REFERENCES GEA_USER(user_email)
);
CREATE TABLE GEA_SUBJECT(
    sub_id INT NOT NULL AUTO_INCREMENT,
    sub_name VARCHAR(30) NOT NULL,
    sub_day INT NOT NULL,
    sub_hour INT NOT NULL,
    sub_sche_title VARCHAR(45) NOT NULL,
    sub_sche_user_email VARCHAR(700) NOT NULL,
    PRIMARY KEY (sub_id,sub_sche_title,sub_sche_user_email),
    CONSTRAINT sub_sche_title__sub_sche_user_email FOREIGN KEY (sub_sche_title, sub_sche_user_email) REFERENCES GEA_SCHEDULE(sche_title, sche_user_email) ON DELETE CASCADE
);
CREATE TABLE GEA_TOPIC(
    top_id INT NOT NULL AUTO_INCREMENT,
	top_title VARCHAR(45) NOT NULL UNIQUE,
    top_description TEXT NOT NULL,
    top_date DATETIME NOT NULL DEFAULT NOW(),
    top_user_email VARCHAR(700) NOT NULL,
    top_user_name VARCHAR(45) NOT NULL,
    PRIMARY KEY (top_id,top_title),
    CONSTRAINT top_user_email FOREIGN KEY (top_user_email) REFERENCES GEA_USER(user_email)
);
CREATE TABLE GEA_COMMENTS(
    com_id INT NOT NULL AUTO_INCREMENT,
	com_message TEXT NOT NULL,
    com_date DATETIME DEFAULT NOW(),
    com_user_name VARCHAR(45) NOT NULL,
    com_top_title VARCHAR(45) NOT NULL,
    com_user_email VARCHAR(700) NOT NULL,
    PRIMARY KEY (com_id, com_top_title, com_user_email),
    CONSTRAINT com_top_title FOREIGN KEY (com_top_title) REFERENCES GEA_TOPIC(top_title),
    CONSTRAINT com_user_email FOREIGN KEY (com_user_email) REFERENCES GEA_USER(user_email)
);

/* ADICIONANDO USUARIOS POR PADRÃO*/
INSERT INTO GEA_USER (user_email,user_name,user_password,user_controller) 
VALUES 
    ('MUIFAKLzHsKdl92ZgqmkPqsC3oZ7OGwLaynfnX28HhnvzZ4ySnmgwjJSIcwswEXNFj9aDIUlvKYKRQsBm4fjihufU0sZB8-rX4ON--sx3auXT1wDE-OuFuJmECaiWZbOtJMWZ6D_31medPMT_ckWI07oJ1UA1q1qj83LZhleT-UJtQZkem9IhRrfyqsY',
    'gearing',
    'MUIFAJeWqQAyWSLaCeDLtcDX8C5HUY7HN8Tq9uXO4932nCShERquEl9VZK3iBNcBMhTKaIN6jy-Zqyxiiohh3CFr5KItzdsfPpqeOM60z15UKsJLygxNd3UYz7_eLWToSAX-943DMLxJp6XQ62WEFTiLXK5TEeU88gYG_DjViBcSzes=',
    true), 
    
    ('MUIFAK-N4coXxfcBxT8xas-6NwcPe0avaf94Dr85fnhEVv5plbVRoUnVIoW63-h60rWNcqvZhzBQ42_scGxP_JzkNtRnjaknQWIBdQV1Swy73PRNcLcFCzb97uHybGYHQ-6my5YDYsVnk-Cv5LD7AR3MMoriYjArgChv6SlYkf3-G2THDzpYl7A=',
    'gui',
    'MUIFAHzmEpsfDbXDFKAWzyVTW9glDWb41T61GyfNhJCv8CIPQWrKOb0Opy4yydIE0J3rAMjWwHtJU2SQjzll-6faE5rbSo9zlUIsCOHzOmdN--zHrxZyl9-5jBtxLeo4a3pkjh9SQ7WzUFIQqFxMz8ufmDba9-SdXwqwkoZGaP93vX5I',
    true),
    
    ('MUIFAGcQVbiHRFRIfuhDgVd6nW0ukOD0cGYI1uWTxuyNLq2iKQZ9wHNWaJ0ez5ZUYDVz1rRrItX5Zn9qodH0hvVMEV7bEL6VEb7JPW_NQ8cvHITdlK0NJ3GvIcCuQ1w3J99GnzdCbCSRdRSf8XQmteE40WRs5SxkQR4jadDLj0ad3cddNObFM_yw8I2PzCRvqBcugA==',
    'nix',
    'MUIFAPmQNNU64lDQmpPSE-IKY3CIvm72jTGtLuClXihOjdqiAlDHcsX6oJV7qpnPs7Zeb3azTzOeCSisFAwqpGrTWiw248vXW3N3n2LLmlIjT8ju1rsRxpoSOIo_zgbubYopqlI28zmNEOKyq24ql37WAg9RcXACa6MR6YP0b6_r6g==',
    true), 
    
    ('MUIFAKv8QsBkqoTCTB_SlxvXhxGfXs0pGO35UZRua2k91Abx-loKUaA_87L9QkA88RxcB-qVVPXC1P89c1zy3Lzkc2noOgUdjtpNXil5og-909u-pTfc_E0h7WXIvc_LIbAQx92amEdQgDS6fBSy4ASNsi_qrcUMeembdPy82kXHwMAWqD_Lbi16u_wo',
    'assíria',
    'MUIFAMKwX1b9mFJnUlQNwztmDkOhbT3AoIOq2O_lxXW9yf1dJulq-NNCLPS5MDWUzkfiElSdTXCIXyEZAFkP0dYof2uBcqRlNH00R5n5fOh4qdZfb-7QX3JikS3gKvJvpg6S6pii8j4vovIb0HpsvKHv0UjFjdZnT3wpN8WikA==',
    true);
/* ADICIONANDO TOPICO NO FORUM POR PADRÃO */
INSERT INTO GEA_TOPIC (top_title,top_description,top_user_email,top_user_name)
VALUES ('titulo de teste','apenas uma descrição qualquer para realizar um teste qualquer', 'MUIFAKLzHsKdl92ZgqmkPqsC3oZ7OGwLaynfnX28HhnvzZ4ySnmgwjJSIcwswEXNFj9aDIUlvKYKRQsBm4fjihufU0sZB8-rX4ON--sx3auXT1wDE-OuFuJmECaiWZbOtJMWZ6D_31medPMT_ckWI07oJ1UA1q1qj83LZhleT-UJtQZkem9IhRrfyqsY','gearing');
/* INSERINDO COMENTARIO POR PADRÃO */
INSERT INTO GEA_COMMENTS (com_message,com_user_name,com_top_title,com_user_email) 
VALUES ('apenas uma mensagem de texto','gui','titulo de teste','MUIFAK-N4coXxfcBxT8xas-6NwcPe0avaf94Dr85fnhEVv5plbVRoUnVIoW63-h60rWNcqvZhzBQ42_scGxP_JzkNtRnjaknQWIBdQV1Swy73PRNcLcFCzb97uHybGYHQ-6my5YDYsVnk-Cv5LD7AR3MMoriYjArgChv6SlYkf3-G2THDzpYl7A=');
