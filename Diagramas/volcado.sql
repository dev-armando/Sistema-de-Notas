/*
	Volcado de datos 
*/

-- periodos 

INSERT INTO periodos (inicio, cierre) values (2017,2018); 

-- roles --

INSERT INTO roles ( descripcion ) VALUES ( 'ROOT' ); 
INSERT INTO roles ( descripcion ) VALUES ( 'MAESTRO' ); 

-- usuarios 

-- Root Armando Rojas
INSERT INTO usuarios (usuarios_id , rol_id , nombre , clave ) VALUES (1, 1 , 'ARMANDO' , md5('26059573') );
-- Maestra Norkis Querales 
INSERT INTO usuarios (usuarios_id , rol_id , nombre , clave ) VALUES (2 , 2 , 'NORKIS' , md5('12964334') );


-- maestros 

INSERT INTO maestros (maestro_id , usuarios_id , nombre , fecha_n) values (12964334, 2 , 'Norkis Del Carmen Querales Tovar',19760313 );


-- grados 

INSERT INTO grados (grado_id, descripcion) values (1 , '1er grado'); 
INSERT INTO grados (grado_id, descripcion) values (2 , '2do grado'); 
INSERT INTO grados (grado_id, descripcion) values (3 , '3er grado'); 
INSERT INTO grados (grado_id, descripcion) values (4 , '4to grado'); 
INSERT INTO grados (grado_id, descripcion) values (5 , '5to grado'); 
INSERT INTO grados (grado_id, descripcion) values (6 , '6to grado'); 

-- materias 

-- 2do Grado 
INSERT INTO materias (materia_id, grado_id , descripcion ) values (1,2 , 'MATEMATICA');
INSERT INTO materias (materia_id, grado_id , descripcion ) values (2,2 , 'CIENCIAS SOCIALES');
INSERT INTO materias (materia_id, grado_id , descripcion ) values (3,2 , 'CIENCIAS NATURALES');
INSERT INTO materias (materia_id, grado_id , descripcion ) values (4,2 , 'CASTELLANO');



-- lugares 

INSERT INTO lugares (lugar_id  , descripcion ) values (1,   'Turen');
INSERT INTO lugares (lugar_id  , descripcion ) values (2,   'Araure');
INSERT INTO lugares (lugar_id  , descripcion ) values (3,   'Acarigua');

-- estudiantes 

-- Euder
INSERT INTO estudiantes (estudiante_id , nombre,  fecha_n , lugar_id ) values (1, 'Euder Isais Guarecuco Figueredo', 20100602, 2 );
-- Leonardo
INSERT INTO estudiantes (estudiante_id , nombre,  fecha_n , lugar_id ) values (2, 'Leonardo David Freitez Montilla', 20101130, 2 );
-- Roiber
INSERT INTO estudiantes (estudiante_id , nombre,  fecha_n , lugar_id ) values (3, 'Roiber Alexander Barrueta Perozo', 20101208, 1 );


