create table tb_upload_img_jeniffer(
    id int primary key auto_increment,
    campo1 varchar(255) not null,
    campo2 varchar(255) not null,
    imagem_nome varchar(255) not null,
    imagem_dados LONGBLOB not null,
    data_insercao timestamp default current_timestamp
);