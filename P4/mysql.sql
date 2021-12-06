
CREATE table EVENTO(
    id int AUTO_INCREMENT primary key,
    nombre varchar(200),
    lugar varchar(200),
    fecha date,
    hora varchar(200),
    precio float,
    enlace varchar(200),
    direccion varchar(200),
    descripcion text,
    dirPortada varchar(200)

);

CREATE table ETIQUETA(
    id int AUTO_INCREMENT primary key,
    evento int,
    etiqueta varchar(200),
    FOREIGN KEY (evento) REFERENCES EVENTO(id)

);

CREATE table IMAGEN(
    id int AUTO_INCREMENT primary key,
    evento int,
    dir varchar(200),
    FOREIGN KEY (evento) REFERENCES EVENTO(id)
);

create table COMMENT(
    id int AUTO_INCREMENT primary key,
    comentario text,
    usuario varchar(200),
    fecha date,
    correo varchar(200),
    evento int,
    FOREIGN KEY (evento) REFERENCES EVENTO(id)
);

create table PALABRASCENSURA(
    id int AUTO_INCREMENT primary key,
    palabra varchar(200)
);



create table USUARIO(
    nombre varchar(255) primary key,
    password varchar(255),
    email varchar(255),
    tipo varchar(255)

);


INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion,dirPortada) values ('Clase de jarrones', 'Escuela de arte', '2021-06-05', '17:00', '45', 'http://www.escueladeartedegranada.es/','Calle Gracia, 4, 18002 Granada', 'Clase de cerámica impartida por el profesor Juan Martínez Pérez. Podrá aprender las técnicas básicas para la realización de un jarrón perfecto. Todos los materiales vienen incluidos con el precio de la clase.

La clase se dividirá en tres partes:

PARTE 1: La creación de la arcilla perfecta

PARTE 2: El moldeado para un jarrón equilibrado

PARTE 3: La cocción del jarrón', 'images/foto1.png' );


INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion, dirPortada) values ('Festival de cerámica', 'Edificio prados', '2021-07-15', '13:00', '20', 'http://www.escueladeartedegranada.es/', 'Calle Elvira, 2, 18002 Granada', 'Festival de cerámica con todo tipo de actividades', 'images/foto2.png' );


INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion,dirPortada) values ('Clase de cerámica tradicional china', 'Escuela de arte', '2021-06-22', '19:00', '67', 'http://www.escueladeartedegranada.es/', 'Calle Gracia, 4, 18002 Granada', 'Clase para aprender todo sobre la cerámica tradicional china', 'images/foto3.png' );


INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion,dirPortada) values ('Clase de principiantes de cerámica', 'Escuela de arte', '2021-08-02', '12:00', '27', 'http://www.escueladeartedegranada.es/', 'Calle Gracia, 4, 18002 Granada', 'Clase para principiantes para aprender los fundamentos de la cerámica', 'images/foto4.png' );

INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion,dirPortada) values ('Clase de mosaicos', 'Escuela de arte', '2021-06-06', '12:20', '54', 'http://www.escueladeartedegranada.es/', 'Calle Gracia, 4, 18002 Granada', 'Clase para aprender cómo realizar mosaicos', 'images/foto5.png' );

INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion,dirPortada) values ('Exposición de jarrones griegos', 'Escuela de arte', '2021-06-09', '13:20', '5', 'http://www.escueladeartedegranada.es/', 'Calle Gracia, 4, 18002 Granada', 'Exposición de jarrones griegos', 'images/foto6.png' );

INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion,dirPortada) values ('Clase de platos', 'Casa de la cultura', '2021-06-09', '13:20', '5', 'http://www.escueladeartedegranada.es/', 'Calle Gracia, 4, 18002 Granada', 'Clase de platos', 'images/foto7.png' );

INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion,dirPortada) values ('Taller de jarrones abstractos', 'Casa de la cultura', '2021-06-09', '13:20', '5', 'http://www.escueladeartedegranada.es/', 'Calle Gracia, 4, 18002 Granada', 'Clase de platos', 'images/foto8.png' );

INSERT into EVENTO(nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion,dirPortada) values ('Clase de tazas', 'Casa de la cultura', '2021-06-09', '13:20', '5', 'http://www.escueladeartedegranada.es/', 'Calle Gracia, 4, 18002 Granada', 'Clase de platos', 'images/foto9.png' );



INSERT into IMAGEN(evento, dir) values ('1', 'images/fotogal1.png');
INSERT into IMAGEN(evento, dir) values ('1', 'images/fotogal2.png');
INSERT into IMAGEN(evento, dir) values ('1', 'images/fotogal3.png');

INSERT into IMAGEN(evento, dir) values ('2', 'images/fotogal1.png');
INSERT into IMAGEN(evento, dir) values ('2', 'images/fotogal2.png');
INSERT into IMAGEN(evento, dir) values ('2', 'images/fotogal3.png');


INSERT into COMMENT(comentario, usuario, fecha, correo, evento) values ('La clase ha sido fantástica', 'mariam', '2021-05-27', 'mariam@gmail.com', '1');
INSERT into COMMENT(comentario, usuario, fecha, correo, evento) values ('Hay mejores clases pero bueno...', 'carmeT', '2021-05-13', 'carmeT@gmail.com', '1');


INSERT into PALABRASCENSURA(palabra) values ('ordenador');
INSERT into PALABRASCENSURA(palabra) values ('mal');
INSERT into PALABRASCENSURA(palabra) values ('horroroso');
INSERT into PALABRASCENSURA(palabra) values ('papel');
INSERT into PALABRASCENSURA(palabra) values ('basura');
INSERT into PALABRASCENSURA(palabra) values ('horarios');
INSERT into PALABRASCENSURA(palabra) values ('chapuza');
INSERT into PALABRASCENSURA(palabra) values ('regular');
INSERT into PALABRASCENSURA(palabra) values ('arte');
INSERT into PALABRASCENSURA(palabra) values ('no');


INSERT into USUARIO(nombre, password, email, tipo) values ('amxndam', '1234', 'em@gmail.com', 'anonimo');

INSERT into USUARIO(nombre, password, email, tipo) values ('a', 'asdf', 'em@gmail.com', 'moderador');

INSERT into USUARIO(nombre, password, email, tipo) values ('g', 'asdf', 'em@gmail.com', 'gestor');
INSERT into USUARIO(nombre, password, email, tipo) values ('super', 'asdf', 'em@gmail.com', 'superusuario');