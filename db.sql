CREATE DATABASE IF NOT EXISTS ejemplo
DEFAULT CHARACTER  SET utf8;
USE ejemplo;

CREATE TABLE proyectos (
  id_proyecto INT NOT NULL UNIQUE AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  repositorio VARCHAR(255) NOT NULL UNIQUE,
  estado TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (id_proyecto)
);
CREATE TABLE lenguajes (
  id_lenguaje INT NOT NULL UNIQUE AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL UNIQUE,
  link TEXT CHARACTER SET utf8 NOT NULL,
  estado TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (id_lenguaje)
);
CREATE TABLE proyecto_lenguaje (
  proyecto_id INT NOT NULL,
  lenguaje_id INT NOT NULL,
  PRIMARY KEY (proyecto_id, lenguaje_id),
  FOREIGN KEY (proyecto_id) REFERENCES proyectos(id_proyecto) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (lenguaje_id) REFERENCES lenguajes(id_lenguaje) ON UPDATE CASCADE ON DELETE CASCADE
);

-- DATA
-- LENGUAJES
INSERT INTO lenguajes(nombre, link) VALUES ("Javascript",'https://www.javascript.com/');
INSERT INTO lenguajes(nombre, link) VALUES ("PHP",'https://www.php.net/');
INSERT INTO lenguajes(nombre, link) VALUES ("Go",'https://golang.org/');
INSERT INTO lenguajes(nombre, link) VALUES ("Assembly",'https://en.wikipedia.org/wiki/Assembly');
INSERT INTO lenguajes(nombre, link) VALUES ("Scala",'https://scala-lang.org/');

-- PROYECTOS
INSERT INTO proyectos(nombre, repositorio) VALUES ("Awesome for beginners",  'https://github.com/mungell/awesome-for-beginners');
INSERT INTO proyectos(nombre, repositorio) VALUES ("Awesome for non-programmers","https://github.com/szabgab/awesome-for-non-programmers");

INSERT INTO proyecto_lenguaje(proyecto_id, lenguaje_id) VALUES ('1','1');
INSERT INTO proyecto_lenguaje(proyecto_id, lenguaje_id) VALUES ('1','2');
INSERT INTO proyecto_lenguaje(proyecto_id, lenguaje_id) VALUES ('2','1');