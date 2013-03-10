INSERT INTO "USB".categorias ("nombre") VALUES ('Entretenimiento');
INSERT INTO "USB".categorias ("nombre") VALUES ('Comida');
INSERT INTO "USB".categorias ("nombre") VALUES ('Deportes');
INSERT INTO "USB".categorias ("nombre") VALUES ('Bibliotecas');
INSERT INTO "USB".categorias ("nombre") VALUES ('Sala de Lectura');
INSERT INTO "USB".categorias ("nombre") VALUES ('Areas Verdes');
INSERT INTO "USB".categorias ("nombre") VALUES ('Entradas y Salidas');
INSERT INTO "USB".categorias ("nombre") VALUES ('Dulcerias');
INSERT INTO "USB".pois ("creator", "nombre", "descripcion", "longitud", "latitud" , "altitud")  VALUES
('admin' , 'lugar1' , 'Este es un lugar x' , 10.234432 , 12.323342, 23.1124 );
INSERT INTO "USB".pois ("creator", "nombre", "descripcion", "longitud", "latitud" , "altitud")  VALUES
('admin' , 'lugar2' , 'Este es un lugar x' , 10.134432 , 12.223342, 23.0124 );
INSERT INTO "USB".pois ("creator", "nombre", "descripcion", "longitud", "latitud" , "altitud")  VALUES
('admin' , 'lugar3' , 'Este es un lugar x' , 10.034432 , 12.123342, 23.9124 );
INSERT INTO "USB".pois ("creator", "nombre", "descripcion", "longitud", "latitud" , "altitud")  VALUES
('admin' , 'lugar4' , 'Este es un lugar x' , 10.934432 , 12.023342, 23.8124 );
INSERT INTO "USB".categorias_poi ("nombre", "poi")  VALUES ( 'Entretenimiento', 21);
INSERT INTO "USB".categorias_poi ("nombre", "poi")  VALUES ( 'Dulcerias', 22);
INSERT INTO "USB".categorias_poi ("nombre", "poi")  VALUES ( 'Dulcerias', 23);
INSERT INTO "USB".categorias_poi ("nombre", "poi")  VALUES ( 'Entretenimiento', 22);
INSERT INTO "USB".categorias_poi ("nombre", "poi")  VALUES ( 'Sala de Lectura', 21);
INSERT INTO "USB".categorias_poi ("nombre", "poi")  VALUES ( 'Dulcerias', 24);
INSERT INTO "USB".multimedia_poi ("enlace", "tipo", "descripcion", "poi" ) VALUES ('www.ldc.usb.ve/ar0811031','Imagen', '', 21);
INSERT INTO "USB".multimedia_poi ("enlace", "tipo", "descripcion", "poi" ) VALUES ('www.ldc.usb.ve/ar0811031','Imagen', '', 22);
INSERT INTO "USB".multimedia_poi ("enlace", "tipo", "descripcion", "poi" ) VALUES ('','Texto', 'Holaaa', 24);
INSERT INTO "USB".multimedia_poi ("enlace", "tipo", "descripcion", "poi" ) VALUES ('www.ldc.usb.ve/ar0811031/algo.mp4','Video', '', 23);
INSERT INTO "USB".multimedia_poi ("enlace", "tipo", "descripcion", "poi" ) VALUES ('','Texto', 'Hola hola', 21);
