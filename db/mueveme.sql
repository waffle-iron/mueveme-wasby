------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios
(
    id  bigserial PRIMARY KEY
   ,nombre varchar(255) NOT NULL UNIQUE
   ,password varchar(255) NOT NULL
   ,email varchar(255) NOT NULL
   ,created_at timestamp(0) NOT NULL DEFAULT current_timestamp
   ,updated_at timestamp(0)

);

CREATE INDEX idx_usuarios_email ON usuarios(email);

DROP TABLE IF EXISTS envios CASCADE;

CREATE TABLE envios
(
    id bigserial PRIMARY KEY
   ,url varchar(255) NOT NULL
   ,titulo varchar(255) NOT NULL
   ,entradilla varchar(255) NOT NULL
   ,usuario_id bigint NOT NULL REFERENCES usuarios (id)
   ,created_at timestamp(0) NOT NULL DEFAULT current_timestamp
   ,updated_at timestamp(0)
);

--Crear indices

DROP TABLE IF EXISTS comentarios CASCADE;

CREATE TABLE comentarios
(

);

DROP TABLE IF EXISTS movimientos CASCADE;

CREATE TABLE movimientos
(
    
);
