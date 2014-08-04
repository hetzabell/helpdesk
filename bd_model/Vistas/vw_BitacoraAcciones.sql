SELECT 
	b.idIncidencia, 
	b.iAccion, 
	b.tFechaCaptura,
	CASE 
		WHEN b.iAccion = 2 THEN CONCAT(acc.sDescripcion, ' ',(SELECT sNombreCompleto FROM gir.usuarios_t usr WHERE usr.idUsuario = inc.idAtiende))
		WHEN b.iAccion = 1 THEN CONCAT(acc.sDescripcion, ' ',(SELECT sNombreCompleto FROM gir.usuarios_t usr WHERE usr.idUsuario = inc.idSolicitante))
		ELSE 'Otro'
	END as sAccion
FROM
	gir.bitacoraacciones_t b,
	gir.acciones_t acc,
	gir.incidencias_t inc
WHERE
	b.iAccion = acc.idAccion
	AND b.idIncidencia = inc.idIncidencia

	