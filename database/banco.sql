DROP DATABASE if exists GEARING;
CREATE DATABASE GEARING;
USE GEARING;

CREATE TABLE GEA_METHODOLOGY(
	meth_name VARCHAR(45) PRIMARY KEY NOT NULL,
    meth_description TEXT NOT NULL, /*TEXT attribute is from MySQL not SQL */
    meth_reference_style VARCHAR(45) NOT NULL
);
CREATE TABLE GEA_USER(
	user_email VARCHAR(80) PRIMARY KEY NOT NULL,
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
    sche_user_email VARCHAR(80) NOT NULL,
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
    sub_sche_user_email VARCHAR(80) NOT NULL,
    PRIMARY KEY (sub_id,sub_sche_title,sub_sche_user_email),
    CONSTRAINT sub_sche_title__sub_sche_user_email 
        FOREIGN KEY (sub_sche_title, sub_sche_user_email) 
        REFERENCES GEA_SCHEDULE(sche_title, sche_user_email) 
			ON DELETE CASCADE 
			ON UPDATE CASCADE
);
CREATE TABLE GEA_TOPIC(
    top_id INT NOT NULL AUTO_INCREMENT,
	top_title VARCHAR(600) NOT NULL UNIQUE,
    top_description TEXT NOT NULL,
    top_date DATETIME NOT NULL DEFAULT NOW(),
    top_user_email VARCHAR(80) NOT NULL,
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
    com_top_title VARCHAR(600) NOT NULL,
    com_user_email VARCHAR(80) NOT NULL,
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
INSERT INTO GEA_USER () VALUES ('gui@gmail.com', 'gui', 'Yfmml4M5z6JJqH7zVxj+Xw==', '1', NULL, NULL);
INSERT INTO GEA_USER () VALUES ('cra@gmail.com', 'Clau🖤', 'TQEiKl1siiYAIPWQMvRjmA==', '1', NULL, NULL);
INSERT INTO GEA_USER () VALUES('assie@gmail.com', 'assíria', 'VS7yWYOf/XBr1ka5PK59/g==', '1', NULL, NULL);
INSERT INTO GEA_USER () VALUES ('gearing@gmail.com', 'gearing', '1UggDwc4uCFQe3NZgbZtHw==', '0', NULL, NULL);
INSERT INTO GEA_TOPIC () VALUES ('1', 'Topico de exemplo', 'Apenas textos de exemplos:\n\nEvidentemente, a consolidação das estruturas cumpre um papel essencial na formulação das novas proposições. Gostaria de enfatizar que a necessidade de renovação processual maximiza as possibilidades por conta do remanejamento dos quadros funcionais. Acima de tudo, é fundamental ressaltar que o julgamento imparcial das eventualidades deve passar por modificações independentemente do sistema de participação geral. O cuidado em identificar pontos críticos no desafiador cenário globalizado talvez venha a ressaltar a relatividade dos índices pretendidos. Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se a complexidade dos estudos efetuados garante a contribuição de um grupo importante na determinação do sistema de formação de quadros que corresponde às necessidades.\n\n          Caros amigos, o desenvolvimento contínuo de distintas formas de atuação prepara-nos para enfrentar situações atípicas decorrentes do impacto na agilidade decisória. Podemos já vislumbrar o modo pelo qual a constante divulgação das informações facilita a criação das posturas dos órgãos dirigentes com relação às suas atribuições. As experiências acumuladas demonstram que a adoção de políticas descentralizadoras obstaculiza a apreciação da importância dos modos de operação convencionais. No mundo atual, o consenso sobre a necessidade de qualificação causa impacto indireto na reavaliação do levantamento das variáveis envolvidas.\n\n          O incentivo ao avanço tecnológico, assim como o início da atividade geral de formação de atitudes promove a alavancagem das diretrizes de desenvolvimento para o futuro.', '2023-07-02 22:23:05', 'gearing@gmail.com', 'gearing');
INSERT INTO GEA_COMMENTS () VALUES ('1', 'Apenas uma resposta qualquer para servir de exemplo:\n\nPodemos já vislumbrar o modo pelo qual a hegemonia do ambiente político faz parte de um processo de gerenciamento dos relacionamentos verticais entre as hierarquias. Ainda assim, existem dúvidas a respeito de como o desenvolvimento contínuo de distintas formas de atuação pode nos levar a considerar a reestruturação do orçamento setorial. É claro que o consenso sobre a necessidade de qualificação possibilita uma melhor visão global da gestão inovadora da qual fazemos parte.\n\n          Do mesmo modo, a determinação clara de objetivos apresenta tendências no sentido de aprovar a manutenção do impacto na agilidade decisória. Assim mesmo, a consolidação das estruturas garante a contribuição de um grupo importante na determinação dos procedimentos normalmente adotados.', '2023-07-02 22:23:19', 'gearing', 'Topico de exemplo', 'gearing@gmail.com');
