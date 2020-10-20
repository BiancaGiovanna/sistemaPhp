create database dbcontatos2020;

use dbcontatos2020;
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
BY 'bcd127';  



create table tblfaleconosco(
	idfaleconosco int not null auto_increment primary key,
    nome varchar(80) not null,
    telefone varchar(15),
    celular varchar(15) not null,
    email varchar(50) not null,
    homepage varchar(250),
    tipomensagem varchar(250),
    mensagem varchar(250) not null,
    sexo varchar(1) not null,
    profissao varchar(50)
    
);
