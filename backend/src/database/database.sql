
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
BY 'bcd127';  

create database dbcms2020;
use dbcms2020;

create table tblgeneros(
	idgeneros int not null auto_increment primary key,
	genero varchar(20) not null, 
    sigla varchar (1) not null
);
create table tblfaleconosco(
	idfaleconosco int not null auto_increment primary key,
    nome varchar(80) not null,
    telefone varchar(15),
    celular varchar(15) not null,
    email varchar(50) not null,
    homepage varchar(250),
    tipomensagem varchar(250),
    mensagem varchar(250) not null,
    idgeneros int(8) not null,
    profissao varchar(50),
    constraint Fk_faleconosco_genero
    foreign key(idgeneros)
    references tblgeneros(idgeneros)
);

create table tbluser(
	iduser int not null auto_increment primary key,
    usuario varchar(30) not null,
    senha varchar(32) not null,
    nome varchar(80) not null, 
    email varchar(50) not null,
    cpf varchar (15) not null,
    status tinyint (0),
    celular varchar(15) not null,
    idgeneros int(8) not null,
	constraint Fk_user_genero
    foreign key(idgeneros)
    references tblgeneros(idgeneros)
);
select * from tbluser;