/***LLENA AREAS***/
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DESCONOCIDO', '0');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION DE ATENCION A CLIENTES', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('SUBDIRECCION DE AUDITORIA', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION ADJUNTA DE CONTABILIDAD', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('SUBDIRECCION DE COORD. DE SUCURSALES', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION DE CREDITO Y ESCRITURACIONES', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCIÓN COMERCIAL FORÁNEA', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCIÓN COMERICAL METROPOLITANA', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCIÓN DIVISIONAL DE ADMINISTRACIÓN Y CONTRALORÍA', '0');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCIÓN GENERAL', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('ESCRITURACIONES', '0');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION ADJUNTA JURIDICA', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION ADJUNTA DE MERCADOTECNIA', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION ADJUNTA DE OPERACIONES', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION ADJUNTA DE PIF', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION DE RH Y ADMINISTRACION', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('SUBDIRECCION DE SERV. GRALES. Y ADQ.', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('SUBDIRECCION CORPORATIVA DE SISTEMAS', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION ADJUNTA DE TESORERIA', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('CONSULTORÍA - EXTERNO', '0');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`) VALUES ('DIRECCION DE PLANEACION ESTRATEGICA', '1');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`, `sTipo`) VALUES ('ADMINISTRATIVO', '1', 'SUCURSAL');
INSERT INTO `gir`.`areas_t` (`sNombreArea`, `bActivo`, `sTipo`) VALUES ('VENTAS', '1', 'SUCURSAL');

/***LLENA SUCURSALES***/
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('CORPORATIVO', 'METROPOLITANA', '5511 9910');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('AGUASCALIENTES', 'FORANEA', '(449) 915 1098, (449) 915 1099');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('ÁGUILAS', 'METROPOLITANA', '5664 0801');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('ALTAVISTA', 'METROPOLITANA', '5550 1666');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('BOSQUES / SANTA FÉ', 'METROPOLITANA', '2591 8945');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('CHAPULTEPEC', 'METROPOLITANA', '4195 7035, 4195 7042');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('CHURUBUSCO', 'METROPOLITANA', '2595 6808');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('COYOACÁN', 'METROPOLITANA', '5554 8062');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('DELTA', 'METROPOLITANA', '2612 1370');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('FÉLIX CUEVAS', 'METROPOLITANA', '5559 2423');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('GUADALAJARA', 'FORANEA', '(33) 3616 6469, (33) 3630 2199');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('INSURGENTES', 'METROPOLITANA', '5207 8737');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('LINDAVISTA', 'METROPOLITANA', '5119-4000');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('LOMAS VERDES', 'METROPOLITANA', '5343 6007');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('MONTERREY, REVOLUCIÓN', 'FORANEA', '(81) 1234 2250, (81) 1234 2239');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('MONTERREY, VALLE', 'FORANEA', '(81) 8262 8222');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('PACHUCA', 'FORANEA', '(771) 107 1012, (771) 153 2933');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('PERIFÉRICO SUR', 'METROPOLITANA', '5665 7080');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('POLANCO', 'METROPOLITANA', '5545 8868');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('PUEBLA', 'FORANEA', '(222) 24 89 778, (222) 24 89 537');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('QUERÉTARO', 'FORANEA', '(442) 212 4048, (442) 212 4973');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('ROMA', 'METROPOLITANA', '5564 5615');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('SATÉLITE', 'METROPOLITANA', '5393 4743');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('TIJUANA', 'FORANEA', '(664) 686 5285');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('TOLUCA', 'FORANEA', '(722) 213 6544, (722) 213 6543');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('VILLACOAPA', 'METROPOLITANA', '5684 6062');
INSERT INTO `gir`.`sucursales_t` (`sDescripcion`, `sLocalidad`, `sTelefonos`) VALUES ('W.T.C. MÉXICO', 'METROPOLITANA', '9000 0201');

/***LLENA TIPO USUARIO***/
INSERT INTO `gir`.`tipousuarios_t` (`sDecripcion`) VALUES ('Super Administrador');
INSERT INTO `gir`.`tipousuarios_t` (`sDecripcion`) VALUES ('Administrador');
INSERT INTO `gir`.`tipousuarios_t` (`sDecripcion`) VALUES ('Ingeniero de Servicio');
INSERT INTO `gir`.`tipousuarios_t` (`sDecripcion`) VALUES ('Usuario');

/***LLENA DEPARTAMENTOS***/
INSERT INTO `gir`.`departamentos_T` (`sDescripcion`) VALUES ('SYSTEM');
INSERT INTO `gir`.`departamentos_T` (`sDescripcion`) VALUES ('DESARROLLO');
INSERT INTO `gir`.`departamentos_T` (`sDescripcion`) VALUES ('SOPORTE TÉCNICO');


/***LLENA SERCICIOS***/
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('OTRO', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('OTRO', '3');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('SAF', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('AFINA', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('HIRAUTO', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('CRM', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('CREDIHIR', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('SICRE', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('HIR BC', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('PÁGINA WEB', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('FLUJO DE EFECTIVO', '2');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('PROBLEMAS CON IMPRESORA', '3');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('CAMBIO DE TONER IMPRESORA', '3');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('MI PC NO ENCIENDE', '3');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('SIN INTERNET', '3');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('SIN CORREO ELECTRÓNICO', '3');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('SIN ACCESO A LOS SISTEMAS', '3');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('PÁGINA WEB CAIDA', '3');
INSERT INTO `gir`.`servicios_t` (`sDescripcion`, `idDepartamento`) VALUES ('SIN LINEA TELEFÓNICA', '3');

/***LLENA ESTATUS DE INCIDENCIAS***/
INSERT INTO `gir`.`status_t` (`sNombreStatus`, `sDescripcionStatus`) VALUES ('Sin Atender', 'Ticket abierto sin asignar');
INSERT INTO `gir`.`status_t` (`sNombreStatus`, `sDescripcionStatus`) VALUES ('En Atención', 'Ticket asignado y en producción');
INSERT INTO `gir`.`status_t` (`sNombreStatus`, `sDescripcionStatus`) VALUES ('STAND BY', 'Ticket en espera de respuesta a la solución o en respuesta de proveedor');
INSERT INTO `gir`.`status_t` (`sNombreStatus`, `sDescripcionStatus`) VALUES ('Cerrado', 'Ticket cerrado y solucionado.');

/***LLENA ACCIONES***/
INSERT INTO `gir`.`acciones_t` (`sDescripcion`) VALUES ('Ticket levantado por');
INSERT INTO `gir`.`acciones_t` (`sDescripcion`) VALUES ('Ticket asignado a');
INSERT INTO `gir`.`acciones_t` (`sDescripcion`) VALUES ('En espera de respuesta de');
INSERT INTO `gir`.`acciones_t` (`sDescripcion`) VALUES ('Continuar atención');
INSERT INTO `gir`.`acciones_t` (`sDescripcion`) VALUES ('realizó un comentario.');
INSERT INTO `gir`.`acciones_t` (`sDescripcion`) VALUES ('calificó la atención recibida.');
INSERT INTO `gir`.`acciones_t` (`sDescripcion`) VALUES ('cerró el ticket.');
INSERT INTO `gir`.`acciones_t` (`sDescripcion`) VALUES ('Asigno el ticket.');

/***Llena motivos de pausa***/
INSERT INTO `gir`.`motivopausas_t` (`sDescripcion`) VALUES ('Respuesta Usuario');
INSERT INTO `gir`.`motivopausas_t` (`sDescripcion`) VALUES ('Respuesta Proveedor');
INSERT INTO `gir`.`motivopausas_t` (`sDescripcion`) VALUES ('Vo. Bo. Usuario');
INSERT INTO `gir`.`motivopausas_t` (`sDescripcion`,`bActivo`) VALUES ('Asignacion tercero','0');

/***Usuario de sistema***/
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`) VALUES ('Sistema GIR', 'gir@hircasa.com', 'N/A', 'N/A', '18', '1', '0', '1');
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('Carlos Martínez', 'cmartinez@hircasa.com', '5121', 'Analista Desarrollador', '18', '1', '0', '3', '2', '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('Hetzabell Madera', 'hmadera@hircasa.com', '5121', 'Analista Desarrollador', '18', '1', '0', '3', '2', '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('Cesar Ortiz', 'cortiz@hircasa.com', '5121', 'Subgerente', '18', '1', '0', '3', '2', '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('Jiovanny Martinez', 'jmartinez@hircasa.com', '5121', 'Analista Desarrollador', '18', '1', '0', '3', '2', '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('David Orozco', 'dorozco@hircasa.com', '7007', 'Gerente', '18', '1', '0', '2', '2', '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('Jesús Girón', 'jgiron@hircasa.com', '5123', 'Gerente', '18', '1', '0', '2', '3', '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('Angel Cobos', 'acobos@hircasa.com', '5153', 'Soporte Técnico', '18', '1', '0', '3', '3', '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('Usuario Solicitante 1', 'testUser1@hircasa.com', '0001', 'N/A', '16', '1', '0', '4', NULL, '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO `gir`.`usuarios_t` (`sNombreCompleto`, `sEmail`, `sExtension`, `sPuesto`, `iArea`, `iSucursal`, `bEncargadoArea`, `iTipoUsuario`, `idDepartamento`, `bActivo`, `sActivacion`, `tFechaCaptura`, `tFechaActivacion`) VALUES ('Usuario Solicitante 2', 'testUser2@hircasa.com', '0001', 'N/A', '16', '1', '0', '4', NULL, '1', 'NADA', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
/*

SET FOREIGN_KEY_CHECKS=0; 
TRUNCATE TABLE gir.incidencias_t;
SET FOREIGN_KEY_CHECKS=1;
*/