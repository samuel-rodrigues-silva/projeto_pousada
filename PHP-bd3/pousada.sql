create table quartos(
	 id int auto_increment primary key,
     num varchar(20) not null unique,
     room_type varchar(8) not null,
     d_price float not null,
     room_status varchar(10)
);

create table cliente(
	id int primary key auto_increment,
    nome varchar(50) not null,
    document varchar(11) not null unique,
    data_nasc date,
    cidade varchar(30),
    estado varchar(30)
);

create table reserva(
	id_reserva int not null primary key auto_increment,
    id_quarto int not null,
    id_cliente int not null,
    data_entrada date not null,
    data_saida date not null,
    valor_reserva float not null,
    status_reserva varchar(10),
    status_dataHora timestamp
);

alter table reserva add foreign key (id_quarto) references quartos(id);
alter table reserva add foreign key (id_cliente) references cliente(id);



