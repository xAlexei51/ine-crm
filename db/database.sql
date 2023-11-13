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
    seccion VARCHAR (255) NOT NULL,
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
    curp,
    genero,
    fecha_nacimiento,
    lugar_nacimiento,
    edad,
    clave_elector,
    folio_nacional,
    fecha_inscripcion_padron,
    correo_electronico,
    telefono,
    /*Domicilio del militante*/
    calle,
    colonia,
    codigo_postal,
    numero_exterior,
    numero_interior,
    /*Identificacion electoral*/
    entidad_federativa,
    distrito_electoral,
    municipio,
    seccion,
    localidad,
    /*Informacion adicional*/
    ocupacion,
    escolaridad,
    medio_transporte,
    discapacidad,
    salario_mensual
)  VALUES 
('Juan', 'García', 'López', 'GALJ930519HJCDRN02', 'Masculino', '1993-05-19', 'Guadalajara', '28', 'GLGJ930519M23', 'FN012345', '2022-01-15', 'juan.garcia@email.com', '555-1234', 'Calle Amapola', 'Centro', '44100', '123', 'A', 'Jalisco', '10', 'Guadalajara', '123', 'Zona 1', 'Ingeniero', 'Licenciatura', 'Auto', 'Ninguna', '50000'),
('Ana', 'Hernández', 'Sánchez', 'HASA880726MSPRRN09', 'Femenino', '1988-07-26', 'Zapopan', '33', 'HARA880726M32', 'FN678910', '2022-02-20', 'ana.hernandez@email.com', '555-5678', 'Calle Rosas', 'La Estancia', '45030', '456', 'B', 'Jalisco', '8', 'Zapopan', '456', 'Zona 2', 'Maestra', 'Preparatoria', 'Bicicleta', 'Visual', '45000'),
('Carlos', 'Martínez', 'Ramírez', 'MARV901105HSPHRL03', 'Masculino', '1990-11-05', 'Tlaquepaque', '31', 'MARX901105M19', 'FN111213', '2022-03-10', 'carlos.martinez@email.com', '555-9876', 'Calle Girasol', 'Las Águilas', '45640', '789', 'C', 'Jalisco', '13', 'Tlaquepaque', '789', 'Zona 3', 'Abogado', 'Universidad', 'Motocicleta', 'Auditiva', '60000'),
('Laura', 'Gómez', 'Fernández', 'GOFL870210MSPRRN08', 'Femenino', '1987-02-10', 'Guadalajara', '35', 'GOFL870210M21', 'FN141516', '2022-04-05', 'laura.gomez@email.com', '555-4321', 'Calle Tulipán', 'Lomas del Valle', '44550', '101', 'D', 'Jalisco', '21', 'Guadalajara', '101', 'Zona 4', 'Médica', 'Maestría', 'Auto', 'Ninguna', '70000'),
('Javier', 'Pérez', 'Díaz', 'PEDJ950705HJSDZJ04', 'Masculino', '1995-07-05', 'Zapopan', '26', 'PEDX950705M32', 'FN171819', '2022-05-20', 'javier.perez@email.com', '555-8765', 'Calle Azucenas', 'Ciudad Bugambilias', '45236', '202', 'B', 'Jalisco', '32', 'Zapopan', '202', 'Zona 5', 'Ingeniero Civil', 'Licenciatura', 'Auto', 'Ninguna', '55000'),
('María', 'López', 'Gutiérrez', 'LOMG900310MSPRRN05', 'Femenino', '1990-03-10', 'Tlaquepaque', '31', 'LOMG900310M16', 'FN202122', '2022-06-15', 'maria.lopez@email.com', '555-2345', 'Calle Girasoles', 'Santa Anita', '45640', '301', 'A', 'Jalisco', '16', 'Tlaquepaque', '301', 'Zona 6', 'Contadora', 'Licenciatura', 'Auto', 'Ninguna', '65000'),
('Alejandro', 'Ramírez', 'Torres', 'RATA840512HJSDLR07', 'Masculino', '1984-05-12', 'Guadalajara', '37', 'RATA840512M23', 'FN232425', '2022-07-30', 'alejandro.ramirez@email.com', '555-6789', 'Calle Orquídeas', 'Lomas del Bosque', '44140', '405', 'B', 'Jalisco', '23', 'Guadalajara', '405', 'Zona 7', 'Empresario', 'Maestría', 'Auto', 'Ninguna', '80000'),
('Sofía', 'Torres', 'Ruiz', 'TORS920815MSPRRN01', 'Femenino', '1992-08-15', 'Zapopan', '29', 'TORS920815M32', 'FN262728', '2022-08-25', 'sofia.torres@email.com', '555-3456', 'Calle Magnolias', 'La Calma', '45070', '506', 'A', 'Jalisco', '32', 'Zapopan', '506', 'Zona 8', 'Diseñadora Gráfica', 'Licenciatura', 'Bicicleta', 'Ninguna', '60000'),
('Ricardo', 'Vargas', 'Hernández', 'VARH960210HSPRCD06', 'Masculino', '1996-02-10', 'Tlaquepaque', '25', 'VARH960210M16', 'FN293031', '2022-09-10', 'ricardo.vargas@email.com', '555-7890', 'Calle Cerezos', 'San Martín de las Flores', '45645', '707', 'B', 'Jalisco', '16', 'Tlaquepaque', '707', 'Zona 9', 'Estudiante', 'Universidad', 'A pie', 'Ninguna', '30000'),
('Isabel', 'Guzmán', 'Mendoza', 'GUZI910525MSPRRN04', 'Femenino', '1991-05-25', 'Guadalajara', '30', 'GUZI910525M23', 'FN323334', '2022-10-15', 'isabel.guzman@email.com', '555-4567', 'Calle Lirios', 'Colinas de San Javier', '44660', '909', 'A', 'Jalisco', '23', 'Guadalajara', '909', 'Zona 10', 'Psicóloga', 'Maestría', 'Auto', 'Ninguna', '75000'),
('Fernando', 'González', 'Cruz', 'GOCF900712HJSGRN01', 'Masculino', '1990-07-12', 'Guadalajara', '31', 'GOCF900712M01', 'FN343536', '2022-11-05', 'fernando.gonzalez@email.com', '555-8765', 'Calle Azaleas', 'Jardines de la Paz', '44150', '204', 'A', 'Jalisco', '1', 'Guadalajara', '204', 'Zona 11', 'Arquitecto', 'Licenciatura', 'Auto', 'Ninguna', '70000'),
('Gabriela', 'Díaz', 'Vega', 'DIVG870315MSPRRN07', 'Femenino', '1987-03-15', 'Zapopan', '34', 'DIVG870315M32', 'FN373839', '2022-12-10', 'gabriela.diaz@email.com', '555-2345', 'Calle Tulipanes', 'Las Fuentes', '45070', '601', 'B', 'Jalisco', '32', 'Zapopan', '601', 'Zona 12', 'Ingeniera de Software', 'Maestría', 'Auto', 'Ninguna', '80000'),
('Rodrigo', 'Molina', 'Soto', 'MORS940620HJGTRD04', 'Masculino', '1994-06-20', 'Tlaquepaque', '27', 'MORS940620M16', 'FN404142', '2023-01-15', 'rodrigo.molina@email.com', '555-7890', 'Calle Jazmín', 'Villas de la Hacienda', '45655', '303', 'C', 'Jalisco', '16', 'Tlaquepaque', '303', 'Zona 13', 'Consultor Financiero', 'Licenciatura', 'Auto', 'Ninguna', '75000'),
('Mónica', 'Sánchez', 'Mendez', 'SAMM880525MSPRRN01', 'Femenino', '1988-05-25', 'Guadalajara', '33', 'SAMM880525M23', 'FN434445', '2023-02-20', 'monica.sanchez@email.com', '555-5678', 'Calle Margaritas', 'La Normal', '44190', '1201', 'A', 'Jalisco', '23', 'Guadalajara', '1201', 'Zona 14', 'Dentista', 'Maestría', 'Bicicleta', 'Ninguna', '65000'),
('Hugo', 'Peralta', 'Juárez', 'PEJH910713HJGPRL02', 'Masculino', '1991-07-13', 'Zapopan', '30', 'PEJH910713M32', 'FN464748', '2023-03-10', 'hugo.peralta@email.com', '555-9876', 'Calle Lluvia', 'Real Vallarta', '45020', '909', 'B', 'Jalisco', '32', 'Zapopan', '909', 'Zona 15', 'Ingeniero Eléctrico', 'Licenciatura', 'Auto', 'Ninguna', '70000'),
('Camila', 'García', 'Martínez', 'GAMC960810MSPRRN05', 'Femenino', '1996-08-10', 'Tlaquepaque', '25', 'GAMC960810M16', 'FN495051', '2023-04-05', 'camila.garcia@email.com', '555-1234', 'Calle Girasol', 'Los Robles', '45670', '505', 'A', 'Jalisco', '16', 'Tlaquepaque', '505', 'Zona 16', 'Psicóloga', 'Licenciatura', 'Auto', 'Ninguna', '60000'),
('Luis', 'Fernández', 'Ríos', 'FERL920502HJGTRI03', 'Masculino', '1992-05-02', 'Guadalajara', '29', 'FERL920502M23', 'FN515253', '2023-05-20', 'luis.fernandez@email.com', '555-2345', 'Calle Azucarillos', 'Colinas de San Isidro', '44530', '708', 'C', 'Jalisco', '23', 'Guadalajara', '708', 'Zona 17', 'Contador', 'Universidad', 'Auto', 'Ninguna', '75000'),
('Valentina', 'Jiménez', 'Mendoza', 'JIMV890715MSPRRN06', 'Femenino', '1989-07-15', 'Zapopan', '32', 'JIMV890715M32', 'FN535455', '2023-06-15', 'valentina.jimenez@email.com', '555-6789', 'Calle Violetas', 'Ciudad Granja', '45010', '1203', 'A', 'Jalisco', '32', 'Zapopan', '1203', 'Zona 18', 'Periodista', 'Licenciatura', 'Motocicleta', 'Ninguna', '70000'),
('Martín', 'Suárez', 'Ortiz', 'SUOM910320HJGSTZ01', 'Masculino', '1991-03-20', 'Tlaquepaque', '30', 'SUOM910320M16', 'FN555657', '2023-07-30', 'martin.suarez@email.com', '555-3456', 'Calle Pinos', 'San Agustín', '45678', '405', 'B', 'Jalisco', '16', 'Tlaquepaque', '405', 'Zona 19', 'Profesor', 'Maestría', 'Auto', 'Ninguna', '65000'),
('Paola', 'Ortega', 'Castillo', 'ORCP960925MSPRRN09', 'Femenino', '1996-09-25', 'Guadalajara', '25', 'ORCP960925M23', 'FN565758', '2023-08-25', 'paola.ortega@email.com', '555-7890', 'Calle Rosas', 'Villas del Prado', '44130', '706', 'A', 'Jalisco', '23', 'Guadalajara', '706', 'Zona 20', 'Diseñadora de Interiores', 'Licenciatura', 'Bicicleta', 'Ninguna', '60000'),
('Elena', 'Ríos', 'Hernández', 'RIHE910320MSPRRN03', 'Femenino', '1991-03-20', 'Guadalajara', '31', 'RIHE910320M23', 'FN575859', '2023-09-10', 'elena.rios@email.com', '555-2345', 'Calle Girasoles', 'Lomas del Parque', '44160', '302', 'B', 'Jalisco', '23', 'Guadalajara', '302', 'Zona 21', 'Enfermera', 'Licenciatura', 'Auto', 'Ninguna', '65000'),
('Adrián', 'Mendoza', 'Vargas', 'MEVA940715HJGTRV02', 'Masculino', '1994-07-15', 'Zapopan', '27', 'MEVA940715M32', 'FN606162', '2023-10-15', 'adrian.mendoza@email.com', '555-5678', 'Calle Azucenas', 'Valle Real', '45019', '1202', 'A', 'Jalisco', '32', 'Zapopan', '1202', 'Zona 22', 'Analista de Sistemas', 'Maestría', 'Auto', 'Ninguna', '70000'),
('Lucía', 'Gutiérrez', 'Rodríguez', 'GULR880530MSPRRN05', 'Femenino', '1988-05-30', 'Tlaquepaque', '33', 'GULR880530M16', 'FN636465', '2023-11-05', 'lucia.gutierrez@email.com', '555-7890', 'Calle Tulipán', 'Las Rosas', '45650', '505', 'A', 'Jalisco', '16', 'Tlaquepaque', '505', 'Zona 23', 'Psicóloga', 'Licenciatura', 'Bicicleta', 'Ninguna', '60000'),
('Martín', 'Soto', 'Gómez', 'SOGM900712HJGTSM04', 'Masculino', '1990-07-12', 'Guadalajara', '31', 'SOGM900712M23', 'FN666768', '2023-12-10', 'martin.soto@email.com', '555-1234', 'Calle Orquídeas', 'Jardines de San Ignacio', '44530', '706', 'B', 'Jalisco', '23', 'Guadalajara', '706', 'Zona 24', 'Abogado', 'Maestría', 'Auto', 'Ninguna', '80000'),
('Renata', 'Vega', 'Martínez', 'VERM950815MSPRRN08', 'Femenino', '1995-08-15', 'Zapopan', '26', 'VERM950815M32', 'FN697071', '2024-01-15', 'renata.vega@email.com', '555-6789', 'Calle Magnolias', 'Real del Bosque', '45089', '909', 'A', 'Jalisco', '32', 'Zapopan', '909', 'Zona 25', 'Diseñadora Gráfica', 'Licenciatura', 'Motocicleta', 'Ninguna', '75000'),
('Pedro', 'Hernández', 'López', 'HELP910522HJGTRP03', 'Masculino', '1991-05-22', 'Tlaquepaque', '30', 'HELP910522M16', 'FN727374', '2024-02-20', 'pedro.hernandez@email.com', '555-9876', 'Calle Cerezos', 'Los Cántaros', '45660', '405', 'B', 'Jalisco', '16', 'Tlaquepaque', '405', 'Zona 26', 'Ingeniero Civil', 'Licenciatura', 'Auto', 'Ninguna', '70000'),
('Marina', 'Juárez', 'Ortiz', 'JUOM960620MSPRRN07', 'Femenino', '1996-06-20', 'Guadalajara', '25', 'JUOM960620M23', 'FN757677', '2024-03-10', 'marina.juarez@email.com', '555-2345', 'Calle Azucarillos', 'Valle de las Flores', '44170', '909', 'C', 'Jalisco', '23', 'Guadalajara', '909', 'Zona 27', 'Arquitecta', 'Licenciatura', 'Auto', 'Ninguna', '60000'),
('Rafael', 'Castillo', 'Díaz', 'CADI920712HJGTSD01', 'Masculino', '1992-07-12', 'Zapopan', '29', 'CADI920712M32', 'FN787980', '2024-04-05', 'rafael.castillo@email.com', '555-3456', 'Calle Pinos', 'Las Lomas', '45040', '1204', 'A', 'Jalisco', '32', 'Zapopan', '1204', 'Zona 28', 'Consultor Financiero', 'Maestría', 'Auto', 'Ninguna', '80000'),
('Sara', 'Guerrero', 'Molina', 'GUMS940525MSPRRN06', 'Femenino', '1994-05-25', 'Tlaquepaque', '27', 'GUMS940525M16', 'FN808182', '2024-05-20', 'sara.guerrero@email.com', '555-6789', 'Calle Lluvia', 'Residencial Victoria', '45678', '303', 'B', 'Jalisco', '16', 'Tlaquepaque', '303', 'Zona 29', 'Médica', 'Licenciatura', 'Bicicleta', 'Ninguna', '65000'),
('Miguel', 'Ortega', 'Gómez', 'ORGM950810HJGTRM04', 'Masculino', '1995-08-10', 'Guadalajara', '26', 'ORGM950810M23', 'FN838485', '2024-06-15', 'miguel.ortega@email.com', '555-7890', 'Calle Violetas', 'Colinas de Santa Fe', '44180', '506', 'A', 'Jalisco', '23', 'Guadalajara', '506', 'Zona 30', 'Ingeniero de Software', 'Licenciatura', 'Auto', 'Ninguna', '70000');





