 ALTER USER "08-11031" WITH ENCRYPTED PASSWORD 'rausb';
 
 DROP SCHEMA "USB" CASCADE;
 
 CREATE SCHEMA "USB"
  AUTHORIZATION postgres;

 GRANT ALL ON SCHEMA "USB" TO 08-11031;
 
CREATE TABLE "USB".categorias(
    nombre varchar(30) PRIMARY KEY NOT NULL,
    CONSTRAINT "PK_categorias" PRIMARY KEY (nombre)
)
WITH(
OIDS=FALSE
);

ALTER TABLE "USB".categorias
  OWNER TO "08-11031";
 
CREATE SEQUENCE "USB".idpois_sequence
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 999999
  START 1
  CACHE 1;

 CREATE TABLE "USB".pois(
     id INTEGER NOT NULL DEFAULT nextval('"USB".idpois_sequence'::regclass),
     creator VARCHAR(50) NOT NULL DEFAULT 'admin',
     nombre VARCHAR(30) NOT NULL, 
     descripcion VARCHAR(100) NOT NULL,
     longitud NUMERIC(18,12) NOT NULL,
     latitud  NUMERIC(18,12) NOT NULL,
     altitud  NUMERIC(18,12) NOT NULL, 
     CONSTRAINT "PK_pois" PRIMARY KEY (id)
)WITH (
  OIDS=FALSE
);
ALTER TABLE "USB".pois
  OWNER TO "08-11031";


 CREATE TABLE "USB".categorias_poi(
     nombre varchar(30) NOT NULL,
     poi INTEGER NOT NULL,
     CONSTRAINT "FK_categorias_poi_poi" FOREIGN KEY (poi) REFERENCES "USB".pois(id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
     CONSTRAINT "FK_categorias_poi_categoria" FOREIGN KEY (nombre) REFERENCES "USB".categorias(nombre) MATCH
     SIMPLE ON UPDATE CASCADE ON DELETE CASCADE
)
WITH(
OIDS=FALSE
);
ALTER TABLE "USB".categorias_poi
  OWNER TO "08-11031";
  
  
CREATE SEQUENCE "USB".idmultimedia
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 999999
  START 1
  CACHE 1;

CREATE TABLE "USB".multimedia_poi(
     id INTEGER NOT NULL DEFAULT nextval ('"USB".idmultimedia'::regclass),
     enlace varchar(2000),
     tipo varchar(20),
     descripcion text,
     poi INTEGER NOT NULL,
     CONSTRAINT  "FK_multimedia_poi" FOREIGN KEY (poi) REFERENCES "USB".pois(id) MATCH SIMPLE
     ON UPDATE CASCADE ON DELETE CASCADE,
     CONSTRAINT "PK_multimedia_poi" PRIMARY KEY (id)
)
WITH(
OIDS=FALSE
);
ALTER TABLE "USB".multimedia_poi
  OWNER TO "08-11031";
 

 
