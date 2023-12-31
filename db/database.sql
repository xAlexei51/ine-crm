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
    nombre VARCHAR (255) NOT NULL,
    apellido_paterno VARCHAR (255) NOT NULL,
    apellido_materno VARCHAR (255) NOT NULL,
    correo_electronico VARCHAR (255) NOT NULL,
    genero VARCHAR (55) NOT NULL,
    fecha_nacimiento VARCHAR (55) NOT NULL,
    telefono VARCHAR (55) NOT NULL,
    calle VARCHAR (255) NOT NULL,
    codigo_postal VARCHAR (55) NOT NULL,
    numero_exterior VARCHAR (55) NOT NULL,
    numero_interior VARCHAR (55) NOT NULL,
    colonia VARCHAR (255) NOT NULL,
    distrito_elctoral VARCHAR (255) NOT NULL,
    municipio VARCHAR (255) NOT NULL,
    ocupacion VARCHAR (255) NOT NULL,
    sector VARCHAR (255) NOT NULL,
    medio_transporte VARCHAR (255) NOT NULL,
    nivel_de_estudios VARCHAR (255) NOT NULL,
    salario_mensual VARCHAR (255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO personas (
    nombre,
    apellido_paterno,
    apellido_materno,
    correo_electronico,
    genero,
    fecha_nacimiento,
    telefono,
    calle,
    codigo_postal,
    numero_exterior,
    numero_interior,
    colonia,
    distrito_elctoral,
    municipio,
    ocupacion,
    sector,
    medio_transporte,
    nivel_de_estudios,
    salario_mensual
) VALUES
('Juan', 'Gómez', 'López', 'juan@gmail.com', 'Masculino', '1990-05-15', '1234567890', 'Avenida Juárez', '44100', '45', 'A', 'Colonia Chapalita', 'Distrito 1', 'Guadalajara', 'Ingeniero', 'Tecnología', 'Automóvil', 'Universidad', '5000'),
('María', 'Martínez', 'García', 'maria@gmail.com', 'Femenino', '1988-08-22', '9876543210', 'Calle Reforma', '45678', '12', 'B', 'Colonia Americana', 'Distrito 2', 'Zapopan', 'Doctora', 'Salud', 'Bicicleta', 'Doctorado', '7000'),
('Carlos', 'Rodríguez', 'Pérez', 'carlos@gmail.com', 'Masculino', '1995-02-10', '5556667777', 'Avenida Vallarta', '67890', '67', 'C', 'Colonia Providencia', 'Distrito 3', 'Tlaquepaque', 'Estudiante', 'Educación', 'Caminando', 'Preparatoria', '3000'),
('Pedro', 'Hernández', 'Gómez', 'pedro@gmail.com', 'Masculino', '1993-09-18', '5551112222', 'Avenida México', '44120', '34', 'A', 'Colonia Moderna', 'Distrito 8', 'Guadalajara', 'Ingeniero Civil', 'Construcción', 'Automóvil', 'Licenciatura', '6500'),
('Ana', 'López', 'Martínez', 'ana@gmail.com', 'Femenino', '1987-06-25', '7778889999', 'Calle Sierra Nevada', '45632', '23', 'B', 'Colonia Jardines del Sol', 'Distrito 9', 'Zapopan', 'Psicóloga', 'Salud Mental', 'Bicicleta', 'Maestría', '7200'),
('Ricardo', 'Sánchez', 'Ramírez', 'ricardo@gmail.com', 'Masculino', '1991-03-10', '3334445555', 'Avenida Guadalupe', '45050', '45', 'C', 'Colonia Santa Margarita', 'Distrito 10', 'Tlaquepaque', 'Periodista', 'Medios de Comunicación', 'Autobús', 'Licenciatura', '5500'),
('Martha', 'Guzmán', 'Fernández', 'martha@gmail.com', 'Femenino', '1995-12-05', '6667778888', 'Calle Reforma', '45678', '12', 'D', 'Colonia El Rosario', 'Distrito 11', 'Guadalajara', 'Diseñadora Gráfica', 'Creativo', 'Caminando', 'Licenciatura', '6000'),
('Héctor', 'Torres', 'Díaz', 'hector@gmail.com', 'Masculino', '1984-08-02', '1112223333', 'Avenida Vallarta', '44130', '56', 'E', 'Colonia Jardines Alcalde', 'Distrito 12', 'Guadalajara', 'Profesor', 'Educación', 'Automóvil', 'Doctorado', '7800'),
('Mónica', 'Fuentes', 'Ramos', 'monica@gmail.com', 'Femenino', '1990-04-15', '4445556666', 'Calle Madero', '45060', '78', 'F', 'Colonia Independencia', 'Distrito 13', 'Zapopan', 'Chef', 'Gastronomía', 'Bicicleta', 'Diplomado', '6700'),
('Javier', 'Lara', 'Castillo', 'javier@gmail.com', 'Masculino', '1988-11-20', '8889990000', 'Avenida Hidalgo', '44140', '90', 'G', 'Colonia Las Aguilas', 'Distrito 14', 'Tlaquepaque', 'Arquitecto', 'Construcción', 'Autobús', 'Maestría', '7200'),
('Sandra', 'Ortega', 'Jiménez', 'sandra@gmail.com', 'Femenino', '1993-06-12', '3334445555', 'Calle Libertad', '45690', '34', 'H', 'Colonia Miravalle', 'Distrito 15', 'Guadalajara', 'Enfermera', 'Salud', 'Caminando', 'Licenciatura', '5800'),
('Martín', 'Morales', 'Hernández', 'martin@gmail.com', 'Masculino', '1985-02-28', '5556667777', 'Avenida Américas', '45070', '56', 'I', 'Colonia Lomas de Guevara', 'Distrito 16', 'Zapopan', 'Programador', 'Tecnología', 'Automóvil', 'Licenciatura', '6900'),
('Elena', 'Ríos', 'Castro', 'elena@gmail.com', 'Femenino', '1996-09-08', '7778889999', 'Calle Colón', '44160', '78', 'J', 'Colonia Vallarta Poniente', 'Distrito 17', 'Guadalajara', 'Abogada', 'Legal', 'Bicicleta', 'Doctorado', '8000'),
('Luis', 'Vega', 'Moreno', 'luis@gmail.com', 'Masculino', '1989-04-30', '1112223333', 'Avenida Revolución', '45680', '90', 'K', 'Colonia Obrera', 'Distrito 18', 'Tlaquepaque', 'Analista de Datos', 'Tecnología', 'Autobús', 'Maestría', '7500'),
('Ana María', 'Castro', 'Navarro', 'anamaria@gmail.com', 'Femenino', '1994-01-02', '4445556666', 'Calle Guanajuato', '45090', '34', 'L', 'Colonia Providencia', 'Distrito 19', 'Zapopan', 'Psiquiatra', 'Salud Mental', 'Caminando', 'Doctorado', '8200'),
('Javier', 'Mendoza', 'Ríos', 'javierm@gmail.com', 'Masculino', '1986-10-15', '8889990000', 'Avenida Niños Héroes', '44170', '56', 'M', 'Colonia La Calma', 'Distrito 20', 'Guadalajara', 'Consultor Financiero', 'Finanzas', 'Automóvil', 'Maestría', '6800'),
('Carmen', 'Villanueva', 'Cortés', 'carmen@gmail.com', 'Femenino', '1990-05-25', '5556667777', 'Calle Veracruz', '45600', '78', 'N', 'Colonia Las Pintas', 'Distrito 21', 'Tlaquepaque', 'Diseñadora de Moda', 'Creativo', 'Bicicleta', 'Licenciatura', '6200'),
('Miguel', 'Fuentes', 'Rojas', 'miguel@gmail.com', 'Masculino', '1993-09-18', '5551112222', 'Avenida Federalismo', '44120', '34', 'H', 'Colonia Moderna', 'Distrito 8', 'Guadalajara', 'Ingeniero Civil', 'Construcción', 'Automóvil', 'Universidad', '6200'),
('Ana', 'Soto', 'Vega', 'ana@gmail.com', 'Femenino', '1991-03-25', '7773334444', 'Calle Constitución', '45050', '23', 'I', 'Colonia Lomas del Parque', 'Distrito 9', 'Zapopan', 'Psicóloga', 'Salud Mental', 'Bicicleta', 'Licenciatura', '6800'),
('Héctor', 'López', 'Mendoza', 'hector@gmail.com', 'Masculino', '1987-06-14', '3335557777', 'Avenida Vallarta', '45600', '56', 'J', 'Colonia Providencia', 'Distrito 10', 'Guadalajara', 'Chef', 'Gastronomía', 'Motocicleta', 'Técnico', '5500'),
('Carmen', 'Gutiérrez', 'Silva', 'carmen@gmail.com', 'Femenino', '1995-12-08', '9994445555', 'Calle Independencia', '46100', '78', 'K', 'Colonia Centro', 'Distrito 11', 'Tlaquepaque', 'Programadora', 'Tecnología', 'Autobús', 'Ingeniería', '7200'),
('Fernando', 'Hernández', 'Jiménez', 'fernando@gmail.com', 'Masculino', '1983-02-02', '6669991111', 'Avenida López Mateos', '45230', '45', 'L', 'Colonia Jardines del Sol', 'Distrito 12', 'Zapopan', 'Arquitecto', 'Construcción', 'Caminando', 'Maestría', '8000'),
('Leticia', 'Ríos', 'Ortiz', 'leticia@gmail.com', 'Femenino', '1990-07-11', '2228884444', 'Calle Revolución', '46020', '67', 'M', 'Colonia Jardines Alcalde', 'Distrito 13', 'Guadalajara', 'Enfermera', 'Salud', 'Automóvil', 'Licenciatura', '6000'),
('Ricardo', 'Nava', 'Campos', 'ricardo@gmail.com', 'Masculino', '1989-05-30', '4445556666', 'Avenida Niños Héroes', '45100', '12', 'N', 'Colonia Morelos', 'Distrito 14', 'Tonalá', 'Diseñador Gráfico', 'Creativo', 'Motocicleta', 'Diplomado', '5000'),
('Gabriela', 'Vargas', 'Molina', 'gabriela@gmail.com', 'Femenino', '1998-11-15', '7772229999', 'Calle Miguel Hidalgo', '45240', '89', 'O', 'Colonia El Colli', 'Distrito 15', 'Zapopan', 'Abogada', 'Legal', 'Autobús', 'Doctorado', '7500'),
('Javier', 'Sánchez', 'Luna', 'javier@gmail.com', 'Masculino', '1986-04-03', '8884445555', 'Avenida La Paz', '45678', '45', 'P', 'Colonia Chapultepec', 'Distrito 16', 'Guadalajara', 'Profesor', 'Educación', 'Bicicleta', 'Licenciatura', '5800'),
('Raquel', 'Torres', 'Santos', 'raquel@gmail.com', 'Femenino', '1996-09-20', '9991113333', 'Calle Miguel Alemán', '46050', '56', 'Q', 'Colonia Atlas', 'Distrito 17', 'Tlaquepaque', 'Contadora', 'Finanzas', 'Caminando', 'Maestría', '6700'),
('Pablo', 'Jiménez', 'Vega', 'pablo@gmail.com', 'Masculino', '1984-01-17', '5551116666', 'Avenida Patria', '45090', '78', 'R', 'Colonia Lomas de Guevara', 'Distrito 18', 'Zapopan', 'Ingeniero Eléctrico', 'Tecnología', 'Automóvil', 'Ingeniería', '7000'),
('Rosa', 'Gómez', 'Mendoza', 'rosa@gmail.com', 'Femenino', '1993-08-10', '6662225555', 'Calle 16 de Septiembre', '45150', '89', 'S', 'Colonia Jardines de San José', 'Distrito 19', 'Guadalajara', 'Periodista', 'Medios de Comunicación', 'Autobús', 'Licenciatura', '6200'),
('Luis', 'Núñez', 'Delgado', 'luis@gmail.com', 'Masculino', '1988-03-05', '7773336666', 'Avenida Tepeyac', '45320', '12', 'T', 'Colonia Miravalle', 'Distrito 20', 'Zapopan', 'Médico', 'Salud', 'Motocicleta', 'Doctorado', '8500'),
('Elena', 'Ortega', 'Ríos', 'elena@gmail.com', 'Femenino', '1990-12-22', '8881114444', 'Calle López Cotilla', '46150', '34', 'U', 'Colonia Americana', 'Distrito 21', 'Guadalajara', 'Psiquiatra', 'Salud Mental', 'Bicicleta', 'Maestría', '7200'),
('Adrián', 'Vega', 'González', 'adrian@gmail.com', 'Masculino', '1985-06-18', '9995558888', 'Avenida Guadalupe', '46080', '56', 'V', 'Colonia Los Alamos', 'Distrito 22', 'Tlaquepaque', 'Diseñador Web', 'Creativo', 'Caminando', 'Licenciatura', '6000'),
('Sofía', 'Hernández', 'López', 'sofia@gmail.com', 'Femenino', '1995-01-30', '5556669999', 'Calle Reforma', '45200', '78', 'W', 'Colonia Chapalita', 'Distrito 23', 'Zapopan', 'Administradora', 'Negocios', 'Automóvil', 'Licenciatura', '6800'),
('Martín', 'Santana', 'Ortiz', 'martin@gmail.com', 'Masculino', '1987-09-12', '6667778888', 'Avenida Vallarta', '46120', '89', 'X', 'Colonia Ciudad del Sol', 'Distrito 24', 'Guadalajara', 'Ingeniero Industrial', 'Construcción', 'Motocicleta', 'Ingeniería', '7500'),
('Lucía', 'García', 'Jiménez', 'lucia@gmail.com', 'Femenino', '1998-04-05', '7778889999', 'Calle Ávila Camacho', '45060', '12', 'Y', 'Colonia Jardines del Bosque', 'Distrito 25', 'Zapopan', 'Nutricionista', 'Salud', 'Bicicleta', 'Licenciatura', '5800'),
('Rodrigo', 'Mendoza', 'Soto', 'rodrigo@gmail.com', 'Masculino', '1984-11-20', '8881112222', 'Avenida México', '46150', '34', 'Z', 'Colonia Providencia', 'Distrito 26', 'Tlaquepaque', 'Economista', 'Finanzas', 'Autobús', 'Maestría', '7000'),
('Paulina', 'Castro', 'Vargas', 'paulina@gmail.com', 'Femenino', '1992-07-15', '9994445555', 'Calle Juárez', '45230', '56', 'AA', 'Colonia Arcos Vallarta', 'Distrito 27', 'Guadalajara', 'Psicóloga Organizacional', 'Recursos Humanos', 'Caminando', 'Doctorado', '7800'),
('Roberto', 'Torres', 'Sánchez', 'roberto@gmail.com', 'Masculino', '1989-02-18', '5556667777', 'Avenida López Cotilla', '45040', '78', 'AB', 'Colonia Del Sur', 'Distrito 28', 'Zapopan', 'Ingeniero Químico', 'Tecnología', 'Automóvil', 'Ingeniería', '8200'),
('Martha', 'Ríos', 'González', 'martha@gmail.com', 'Femenino', '1995-05-30', '6667778888', 'Calle Tonalá', '46100', '89', 'AC', 'Colonia Las Águilas', 'Distrito 29', 'Tonalá', 'Diseñadora de Moda', 'Creativo', 'Motocicleta', 'Licenciatura', '6500'),
('Daniel', 'Santana', 'Delgado', 'daniel@gmail.com', 'Masculino', '1986-10-10', '7778889999', 'Avenida Reforma', '45240', '12', 'AD', 'Colonia El Bajío', 'Distrito 30', 'Guadalajara', 'Abogado Corporativo', 'Legal', 'Autobús', 'Maestría', '7200');



