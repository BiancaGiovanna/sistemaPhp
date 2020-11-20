
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
	statusContato boolean,
    celular varchar(15) not null,
    idgeneros int(8) not null,
	constraint Fk_user_genero
    foreign key(idgeneros)
    references tblgeneros(idgeneros)
);
create table tblprodutos(
	idprodutos int not null auto_increment primary key,
    nome varchar(50) not null,
    descricao varchar(50) not null,
    preco decimal(12) not null,
    destaque boolean,
    promocao boolean,
    imagens varchar (32) not null,
    statusProduto boolean
);
create table tblcategoria(
	idCategoria int not null auto_increment primary key,
    nome varchar(40) not null,
    statusCategoria boolean
);
create table tblsubcategoria(
	idSubcategoria int not null auto_increment primary key,
    nomesub varchar(40) not null,
    statusSubcategoria boolean,
    idCategoria int(20) not null,
    constraint Fk_categoira_subcategoria
    foreign key(idCategoria)
    references tblcategoria(idCategoria)
);

select tblcategoria.idCategoria, tblcategoria.nome, 
tblcategoria.statusCategoria
from tblcategoria order by tblcategoria.idCategoria desc;

select tblsubcategoria.idSubcategoria, tblsubcategoria.nomesub, 
tblsubcategoria.statusSubcategoria, tblsubcategoria.idCategoria, tblcategoria.nome
from tblsubcategoria, tblcategoria 
where tblsubcategoria.idCategoria = tblcategoria.idCategoria
order by tblsubcategoria.idSubcategoria desc;


create table tbllojas (
	idlojas int not null auto_increment primary key,
    nome varchar(50) not null,
    cep varchar(9) not null,
    rua varchar(70) NOT NULL,
    bairro varchar(50) NOT NULL,
    cidade varchar(50) NOT NULL,
    estado varchar(2) NOT NULL,
    statusLoja boolean,
    foto varchar(40) not null
);
create table tblsobre(
	idsobre integer not null auto_increment primary key,
    sobre text not null,
    statusSobre boolean
);

insert into tblgeneros(genero, sigla)
values ('Feminino', 'F'),
		('Masculino', 'M'),
        ('Outro', 'O');
        
                       