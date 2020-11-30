

	alter table cidade add foreign key (estado_id) references estado(codigo);

select nome,document,data_nasc from cliente where id = 8;
select * from quartos;

select * from reserva ;
UPDATE cliente SET document = '123456' , data_nasc = '1997-10-30' WHERE id = 8; 