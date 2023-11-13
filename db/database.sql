CREATE DATABASE ine_database;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT, 
    nombre NOT NULL (100) NOT NULL,
    email VARCHAR (100) NOT NULL,
    telefono varchar (55) NOT NULL, 
    username VARCHAR (55) NOT NULL,
    password VARCHAR (100) NOT NULL ,
    PRIMARY KEY (id) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE militantes (
    id INT NOT NULL AUTO_INCREMENT,
    /*Identificacion*/
    nombre VARCHAR (255) NOT NULL,
    apellido_paterno VARCHAR (255) NOT NULL,
    apellido_materno VARCHAR (255) NOT NULL DEFAULT '',
    curp VARCHAR (255) NOT NULL,
    genero VARCHAR (55) NOT NULL,
    fecha_nacimiento VARCHAR (55) NOT NULL,
    lugar_nacimiento VARCHAR (255) NOT NULL,
    edad VARCHAR (55) NOT NULL,
    clave_elector VARCHAR (255) NOT NULL,
    folio_nacional VARCHAR (255) NOT NULL,
    fecha_inscripcion_padron VARCHAR (255) NOT NULL,
    correo_electronico VARCHAR (255) NOT NULL,   
    telefono VARCHAR (55) NOT NULL,     
    /*Domicilio*/    
    calle VARCHAR (255) NOT NULL, 
    colonia VARCHAR (255) NOT NULL,      
    codigo_postal VARCHAR (55) NOT NULL,
    numero_exterior VARCHAR (55) NOT NULL,
    numero_interior VARCHAR (55) NOT NULL DEFAULT '',
    /*Identificacion Electoral*/
    entidad_federativa VARCHAR (255) NOT NULL DEFAULT 'Jalisco',  
    distrito_electoral VARCHAR (255) NOT NULL,
    municipio VARCHAR (255) NOT NULL,
    seccion VARCHAR (255) NOT NULL,,
    localidad VARCHAR (255) NOT NULL,
    /*Informacion adicional */    
    ocupacion VARCHAR (255) NOT NULL,
    escolaridad VARCHAR (255) NOT NULL,
    medio_transporte VARCHAR (255) NOT NULL, 
    discapacidad VARCHAR (255) NOT NULL DEFAULT 'N/A',   
    salario_mensual VARCHAR (255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO militantes (
    nombre, 
    apellido_paterno,
    apellido_materno,
    correo_electronico,
    genero, 
    fecha_nacimiento, edad, 
    calle, 
    telefono, 
    codigo_postal, 
    numero_exterior, 
    numero_interior, 
    colonia, 
    municipio, 
    distrito_electoral, 
    ocupacion, 
    sector, 
    medio_transporte, 
    nivel_de_estudios, 
    salario_mensual
)  VALUES 
('Ana', 'García', 'Martínez', 'ana.garcia@email.com', 'Femenino', '1990-05-15', '32', 'Calle Alameda', '1122334455', '45067', '123', 'A', 'Colonia Bella Vista', 'Guadalajara', 'Distrito 8', 'Médico', 'Salud', 'Automóvil', 'Licenciatura', '60000'),
('Carlos', 'Hernández', 'López', 'carlos.hernandez@email.com', 'Masculino', '1988-11-20', '34', 'Avenida Revolución', '5544332211', '43021', '456', 'B', 'Colonia Moderna', 'Zapopan', 'Distrito 4', 'Ingeniero', 'Tecnología', 'Bicicleta', 'Maestría', '75000'),
('Laura', 'Rodríguez', 'Sánchez', 'laura.rodriguez@email.com', 'Femenino', '1995-08-03', '27', 'Calle Constitución', '9988776655', '36210', '789', 'C', 'Colonia Jardines Alcalde', 'Guadalajara', 'Distrito 12', 'Economista', 'Finanzas', 'Transporte Público', 'Licenciatura', '55000'),
('Miguel', 'Díaz', 'Ramírez', 'miguel.diaz@email.com', 'Masculino', '1992-02-28', '30', 'Paseo de los Laureles', '6677889900', '50123', '101', 'D', 'Colonia Providencia', 'Zapopan', 'Distrito 9', 'Abogado', 'Legal', 'Automóvil', 'Doctorado', '90000'),
('Sofía', 'López', 'Gutiérrez', 'sofia.lopez@email.com', 'Femenino', '1980-12-10', '42', 'Calle Morelos', '3344556677', '48901', '234', 'E', 'Colonia Lomas del Valle', 'Guadalajara', 'Distrito 6', 'Profesor', 'Educación', 'Transporte Público', 'Licenciatura', '48000'),
('Diego', 'Martínez', 'Ortega', 'diego.martinez@email.com', 'Masculino', '1997-04-18', '25', 'Avenida Vallarta', '1122334455', '45067', '345', 'F', 'Colonia Americana', 'Zapopan', 'Distrito 2', 'Arquitecto', 'Construcción', 'Bicicleta', 'Maestría', '70000'),
('Fernanda', 'Gutiérrez', 'Torres', 'fernanda.gutierrez@email.com', 'Femenino', '1986-07-22', '36', 'Calle Madero', '9988776655', '36210', '567', 'G', 'Colonia Jardines del Bosque', 'Guadalajara', 'Distrito 11', 'Periodista', 'Comunicación', 'Transporte Público', 'Licenciatura', '62000'),
('Javier', 'Sánchez', 'Núñez', 'javier.sanchez@email.com', 'Masculino', '1993-09-05', '29', 'Calle Hidalgo', '6677889900', '50123', '678', 'H', 'Colonia Miravalle', 'Tlaquepaque', 'Distrito 7', 'Diseñador', 'Creatividad', 'Automóvil', 'Licenciatura', '58000'),
('Valeria', 'Ramírez', 'Gómez', 'valeria.ramirez@email.com', 'Femenino', '1984-01-12', '38', 'Avenida Chapultepec', '3344556677', '48901', '789', 'I', 'Colonia Lomas de Chapultepec', 'Zapopan', 'Distrito 3', 'Marketing', 'Negocios', 'Transporte Público', 'Maestría', '80000'),
('Alejandro', 'Pérez', 'González', 'alejandro.perez@email.com', 'Masculino', '1998-06-30', '24', 'Calle Reforma', '1122334455', '45067', '890', 'J', 'Colonia Altamira', 'Guadalajara', 'Distrito 10', 'Ingeniero Civil', 'Ingeniería', 'Bicicleta', 'Licenciatura', '67000'),
('Isabella', 'Hernández', 'Guzmán', 'isabella.hernandez@email.com', 'Femenino', '1991-08-12', '31', 'Calle Libertad', '1122334455', '45067', '45', 'A', 'Colonia Lomas del Mar', 'Puerto Vallarta', 'Distrito 5', 'Médico', 'Salud', 'Automóvil', 'Licenciatura', '65000'),
('Luis', 'Martínez', 'Castro', 'luis.martinez@email.com', 'Masculino', '1987-04-28', '34', 'Avenida Juárez', '5544332211', '43021', '123', 'B', 'Colonia Centro', 'Guadalajara', 'Distrito 1', 'Ingeniero', 'Tecnología', 'Transporte Público', 'Maestría', '72000'),
('María', 'Díaz', 'López', 'maria.diaz@email.com', 'Femenino', '1994-02-15', '28', 'Calle Ocampo', '9988776655', '36210', '567', 'C', 'Colonia Jardines del Sol', 'Zapopan', 'Distrito 9', 'Economista', 'Finanzas', 'Bicicleta', 'Licenciatura', '60000'),
('Jorge', 'Sánchez', 'Nava', 'jorge.sanchez@email.com', 'Masculino', '1990-12-03', '32', 'Avenida Revolución', '6677889900', '50123', '789', 'D', 'Colonia Lomas del Valle', 'Guadalajara', 'Distrito 8', 'Abogado', 'Legal', 'Automóvil', 'Doctorado', '90000'),
('Mariana', 'López', 'Torres', 'mariana.lopez@email.com', 'Femenino', '1983-06-20', '39', 'Calle Madero', '3344556677', '48901', '890', 'E', 'Colonia Altamira', 'Tlaquepaque', 'Distrito 4', 'Profesor', 'Educación', 'Transporte Público', 'Licenciatura', '55000'),
('Ricardo', 'Gutiérrez', 'Vega', 'ricardo.gutierrez@email.com', 'Masculino', '1996-09-18', '26', 'Avenida Vallarta', '1122334455', '45067', '234', 'F', 'Colonia Lomas del Bosque', 'Zapopan', 'Distrito 6', 'Arquitecto', 'Construcción', 'Bicicleta', 'Maestría', '70000'),
('Paula', 'Hernández', 'Ortega', 'paula.hernandez@email.com', 'Femenino', '1985-07-22', '37', 'Calle Morelos', '9988776655', '36210', '345', 'G', 'Colonia Providencia', 'Guadalajara', 'Distrito 11', 'Periodista', 'Comunicación', 'Transporte Público', 'Licenciatura', '62000'),
('Juan', 'Ramírez', 'Gómez', 'juan.ramirez@email.com', 'Masculino', '1993-10-05', '29', 'Avenida Chapultepec', '6677889900', '50123', '456', 'H', 'Colonia Las Águilas', 'Zapopan', 'Distrito 2', 'Diseñador', 'Creatividad', 'Automóvil', 'Licenciatura', '58000'),
('Gabriela', 'Pérez', 'Mendoza', 'gabriela.perez@email.com', 'Femenino', '1982-01-12', '40', 'Calle Reforma', '3344556677', '48901', '567', 'I', 'Colonia Jardines de la Patria', 'Guadalajara', 'Distrito 10', 'Marketing', 'Negocios', 'Transporte Público', 'Maestría', '80000'),
('Alejandro', 'García', 'Rodríguez', 'alejandro.garcia@email.com', 'Masculino', '1999-04-30', '23', 'Avenida Hidalgo', '1122334455', '45067', '678', 'J', 'Colonia Bugambilias', 'Zapopan', 'Distrito 7', 'Ingeniero Civil', 'Ingeniería', 'Bicicleta', 'Licenciatura', '67000');





