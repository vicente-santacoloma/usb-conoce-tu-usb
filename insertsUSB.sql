INSERT INTO "USB".categorias ("nombre") VALUES ('Entretenimiento');
INSERT INTO "USB".categorias ("nombre") VALUES ('Comida');
INSERT INTO "USB".categorias ("nombre") VALUES ('Deportes');
INSERT INTO "USB".categorias ("nombre") VALUES ('Bibliotecas');
INSERT INTO "USB".categorias ("nombre") VALUES ('Sala de Lectura');
INSERT INTO "USB".categorias ("nombre") VALUES ('Areas Verdes');
INSERT INTO "USB".categorias ("nombre") VALUES ('Entradas y Salidas');
INSERT INTO "USB".categorias ("nombre") VALUES ('Dulcerias');
INSERT INTO "USB".categorias ("nombre") VALUES ('Servicios');


-- Insert de POIS USB
INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud")  VALUES
('admnin', 'Doña Jojoto', 'Comida rapida cachapas, tequeños', '10.413233', '-66.88761', '0');

	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES('Comida',1);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Cancha de Beisbol', 'Cancha de Beisbol', '10.412848', '-66.887121', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entretenimiento',2);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Deportes',2);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Piscina olimpica', 'Piscina', '10.412305', '-66.889117', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entretenimiento',3);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Deportes',3);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Campo de futbol', 'Campo de futbol y olimpico', '10.41269','-66.888452', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entretenimiento',4);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Deportes',4);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin','Gimnasio cubierto', 'Gimnasio, cancha de basketball cubierta', '10.411487','-66.888656', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entretenimiento',5);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Deportes',5);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Cafeteria Ampere', 'Comida rapida, dulceria, cafeteria', '10.410268','-66.883645', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Dulcerias',6);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Comida',6);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin','Casa del profesor', 'Restaurante, sala de fiesta y reuniones', '10.408099', '-66.882036', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Comida',7);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entretenimiento',7);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Acuario cafe', 'Comida rapida por peso y sushi', '10.406933','-66.880716', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Comida',8);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Comedor Estudiantes', 'Comedor exclusivo para estudiantes y obreros', '10.407229','-66.877374', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Comida',9);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Servicios',9);
	INSERT INTO "USB".multimedia_poi("enlace","tipo","poi") VALUES ('https://serviciocomedor.dii.usb.ve/recargacomedor/','texto',9);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Parada de Autobuses', 'Parada de autobuses', '10.409603','-66.882975','0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Servicios',10);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Laguna de los Patos', 'Areas verdes, laguna, arte', '10.410226','-66.878227', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Areas Verdes',11);
	INSERT INTO "USB".multimedia_poi("enlace","tipo","poi") VALUES ('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSpA4P2I9XzXtMv59yFw3S1dAFEZRHC-XRoiReyYMZYANt2fcPy','imagen',11);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Comedor Camuri Alto', 'Restaurante manejado por estudiantes de Hoteleria USB','10.413402','-66.880277','0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Comida',12);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Proveeduria Estudiantil', 'Dulceria, cafeteria, servicios de papeleria', '10.411972', '-66.881215', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Comida',13);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Servicios',13);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Jardin Cromovegetal', 'Jardin unico en Venezuela, obra de Carlos Cruz-Diez', '10.410542', '-66.881296', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Areas Verdes',14);
	

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Biblioteca central', 'Biblioteca central', '10.410136','-66.880287', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Bibliotecas',15);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Servicios',15);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Comedor MYS', 'Comedor exclusivo para estudiantes y obreros', '10.409403','-66.882642', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Servicios',16);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Comida',16);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Entrada principal', 'Entrada principal', '10.40983','-66.876505', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entradas y Salidas',17);
	INSERT INTO "USB".multimedia_poi("enlace","tipo","poi") VALUES ('http://2.bp.blogspot.com/_Q0kJGmSk8vk/TGqgoB-tTCI/AAAAAAAAGM8/oVQV4BoVpKk/s1600/214.+Universidad+Sim%C3%B3n+Bol%C3%ADvar.jpg','imagen',17);
INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Entrada y salida principal', 'Salida principal, entrada en horarios especificos', '10.407582','-66.875985', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entradas y Salidas',18);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Salida Hoyo de La Puerta', 'Salida exclusiva Hoyo de La Puerta', '10.407115','-66.876035', '0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entradas y Salidas',19);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Sala de lectura IQ', 'Sala de Lectura Ingenieria Quimica', '10.411666','-66.881639','0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Servicios',20);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Dulcerias',20);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Sala de Lectura',20);

INSERT INTO "USB".pois ("creador", "nombre", "descripcion", "longitud", "latitud" , "altitud") VALUES
('admin', 'Sala de lectura Computacion', 'Sala de Lectura Ingenieria en Computacion', '10.409039','-66.882701','0');
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Servicios',21);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Dulcerias',21);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Sala de Lectura',21);
	INSERT INTO "USB".categorias_poi("nombre","poi") VALUES ('Entretenimiento',21);

