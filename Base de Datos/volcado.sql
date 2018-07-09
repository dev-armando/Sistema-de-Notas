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
INSERT INTO usuarios (usuarios_id , rol_id , nombre , clave ) VALUES (2 , 2 , 'NORKIS' , md5('123') );


-- maestros 

INSERT INTO maestros (maestro_id , usuarios_id , nombre , fecha_n , sexo) values (12964334, 2 , 'Norkis Del Carmen Querales Tovar',19760313 , 'f');


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
INSERT INTO lugares (lugar_id  , descripcion ) values (4,   'San Fernando');
INSERT INTO lugares (lugar_id  , descripcion ) values (4,   'San Cristobal');

-- estudiantes 

-- Euder
INSERT INTO estudiantes (estudiante_id , nombre,  fecha_n , lugar_id , sexo) values (1, 'Euder Isais Guarecuco Figueredo', 20100602, 2 , 'm' );
-- Leonardo
INSERT INTO estudiantes (estudiante_id , nombre,  fecha_n , lugar_id , sexo) values (2, 'Leonardo David Freitez Montilla', 20101130, 2 , 'm'  );
-- Roiber
INSERT INTO estudiantes (estudiante_id , nombre,  fecha_n , lugar_id , sexo) values (3, 'Roiber Alexander Barrueta Perozo', 20101208, 1 , 'm'  );

-- Salon de Norkis Querales = 1
INSERT INTO cursos (curso_id , periodo_id , grado_id , maestro_id , seccion ) VALUES (1 , 1, 2 , 12964334, 'C' );

-- Asignar Estudiantes 

INSERT INTO cursos_estudiantes (curso_id , estudiante_id, nota ) values (1, 1 ,20);

INSERT INTO cursos_estudiantes (curso_id , estudiante_id, nota ) values (1, 2 , 15);

INSERT INTO cursos_estudiantes (curso_id , estudiante_id, nota ) values (1, 3 , 11);

-- literales 

INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'A' , 'Excelente', 19 , 20  , 'm' , 'Es un niño muy responsable, obediente, respetuoso, 
	solidario con sus compañeros de clases, cabe destacar, que en valor de la lectura, lograr leer frases 
	y oraciones con fluidez, exposiciones sobre el valor de la armonía, muestra interés para utilizar el
	 diccionario, elabora biografías de personajes ilustres de Venezuela, en cuanto a los cálculos conoce
	  y aplica las propiedades asociativas y conmutativas, identifica y reconoce los números hasta el mil, 
	  conoce la tabla de multiplicar hasta el tres, por lo tanto se le sugiere seguir asi practicando lectura, escritura, y calculo'); 



INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'A' , 'Excelente', 19 , 20  , 'f' , 'Es una niña solidaria, respetuosa, solidaria con sus compañeros, participa, muestra responsabilidad al momento de realizar sus actividades escolares, asiste frecuentemente a clases, su comportamiento y disciplina son satisfactorio, lee de manera fluida cualquier texto, analiza y realiza producciones de manera individual en forma satisfactoria, su escritura es legible, realiza producciones dirigidas tomando en cuenta los signos de puntuación y aspectos formales de la escritura, resuelve adicciones, sustracciones, y multiplicaciones, conoce la tabla hasta el tres. Alcanzo todas las competencias previstas, en algunos casos supero las expectativas para el grado.  ' );




INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'B' , 'Bueno', 15 , 18  , 'm' , 'Es un niño tranquilo, obediente, trabajador en algunos casos muestra un poco desanimado pero luego se involucra en las actividades que se realiza. Es amistoso y buen compañero asiste frecuentemente a clases y su comportamiento es satisfactorio, lee de manera fluida, aunque su tono de voz es bajo, su estructura es legible, realiza dictados, analiza texto de manera individual, se devuelven satisfactoriamente al momento de realizar producciones en forma individual. En el área de matemática  y conteo de cantidades, resuelve adicciones y sustracciones llevando y quitando prestado, realiza multiplicaciones sencillas conociendo la tabla del multiplicar hasta el tres, el niño alcanzo las competencias previstas para el grado. Recomendaciones: El niño requiere de apoyo para que se apropie del estudio de las matemáticas, para que se siente segura del desarrollo de su aprendizaje. ' );



INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'B' , 'Bueno', 15 , 18  , 'f' , 'Es un niña tranquila obediente, trabajadora en algunos casos muestra un poco desanimado pero luego se involucra en las actividades que se realiza. Es amistosa y buen compañera asiste frecuentemente a clases y su comportamiento es satisfactorio, lee de manera fluida, aunque su tono de voz es bajo, su estructura es legible, realiza dictados, analiza texto de manera individual, se devuelven satisfactoriamente al momento de realizar producciones en forma individual. En el área de matemática  y conteo de cantidades, resuelve adicciones y sustracciones llevando y quitando prestado, realiza multiplicaciones sencillas conociendo la tabla de multiplicar hasta el tres, la niña alcanzo las competencias previstas para el grado. Recomendaciones: La niño requiere de apoyo para que se apropie del estudio de las matemáticas, para que se sienta segura del desarrollo de su aprendizaje. ' );


INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'C' , 'Regular', 14 , 13  , 'f' , 'Alcanzó algunas de las competencias previstas para el  grado, requiere de un proceso de nivelación al inicio del año escolar para alcanzar las restantes.');

INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'C' , 'Regular', 14 , 13  , 'm' , 'Alcanzó algunas de las competencias previstas para el  grado, requiere de un proceso de nivelación al inicio del año escolar para alcanzar las restantes.');


INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'D' , 'Deficiente', 10 , 11  , 'f' , 'Es una  niña muy intranquila , le gusta conversar con sus compañeros  poco  participativa en clase lo cual no le permite prestar atención a lo que se le  está explicando,  sin embargo, conoce y escribe el abecedario, Su lectura es poco fluida, requiere de la práctica con frecuencia,  necesita mejorar la escritura. Escribe palabras de uso cotidiano, Resuelve ejercicios de suma y resta sencillos de solo dos cifras, Reconoce cantidades de dos cifras. Por otra parte él realiza los número del 1 al 500, con dificultad, En la producción de textos sencillos de sus experiencias y la resolución de problemas matemáticos sencillos de sus vivencias lo realiza con la ayuda del docente, identifica palabras cortas y largas.
Cabe destacar que, la niña participa en el desarrollo  de las clases planificadas dentro y fuera del aula de clase como, simulacro ante a una situación de emergencia sobrenatural, así como también, en la construcción del hurto escolar y en la exposición específicamente del cebollín la cual, realizo con un tono de voz adecuado, mostrando seguridad y dominio del tema 
Observación: Requiere de la ayuda individual para que se apropie de la lectura y escritura y los ejercicios matemáticos. De igual manera del apoyo de sus padres y representantes para que se sienta seguro en el desarrollo de su aprendizaje, y pueda salir adelante.
');

INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'D' , 'Deficiente', 10 , 11  , 'm' , 'Es un  niño muy intranquilo , le gusta conversar con sus compañeros  poco  participativo en clase lo cual no le permite prestar atención a lo que se le  está explicando,  sin embargo, conoce y escribe el abecedario, Su lectura es poco fluida, requiere de la práctica con frecuencia,  necesita mejorar la escritura. Escribe palabras de uso cotidiano, Resuelve ejercicios de suma y resta sencillos de solo dos cifras, Reconoce cantidades de dos cifras. Por otra parte él realiza los número del 1 al 500, con dificultad, En la producción de textos sencillos de sus experiencias y la resolución de problemas matemáticos sencillos de sus vivencias lo realiza con la ayuda del docente, identifica palabras cortas y largas.
Cabe destacar que, el niño participa en el desarrollo  de las clases planificadas dentro y fuera del aula de clase como, simulacro ante a una situación de emergencia sobrenatural, así como también, en la construcción del hurto escolar y en la exposición específicamente del cebollín la cual, realizo con un tono de voz adecuado, mostrando seguridad y dominio del tema 
Observación: Requiere de la ayuda individual para que se apropie de la lectura y escritura y los ejercicios matemáticos. De igual manera del apoyo de sus padres y representantes para que se sienta seguro en el desarrollo de su aprendizaje, con apoyo saldrá adelante.
');


INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'E' , 'Reprobado', 1 , 9  , 'f' , 'La niña no logra avanzar al siguiente grado');

INSERT INTO literales (grado_id , nota, valor , rango_d , rango_h , sexo , descripcion)
VALUES (2 , 'E' , 'Reprobado', 1 , 9  , 'm' , 'El niño no logro avanzar al siguiente grado');




