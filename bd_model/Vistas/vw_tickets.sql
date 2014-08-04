SELECT 
	inc.idIncidencia,
	CASE WHEN inc.iServicio = 1 THEN inc.sAsunto
	ELSE (select serv1.sDescripcion from gir.servicios_t serv1 where serv1.idServicio = inc.iServicio)
	END as sAsunto,
	inc.idSolicitante,
	DATE_FORMAT(inc.tFechaCaptura,'%d/%m/%Y %r') as tFechaCreacion,
	DATE_FORMAT(inc.tFechaAsignacion,'%d/%m/%Y %r') as tFechaAsignacion,
	DATE_FORMAT(inc.tFechaCierre,'%d/%m/%Y %r') as tFechaCierre,
	inc.idAtiende,
	inc.iStatus,
	usr.sNombreCompleto,
	dep.idDepartamento
FROM 
	gir.incidencias_t inc,
	gir.servicios_t serv,
	gir.departamentos_t dep,
	gir.usuarios_t usr
WHERE
	inc.iServicio = serv.idServicio
	AND serv.idDepartamento = dep.idDepartamento
	AND inc.idSolicitante = usr.idUsuario
;


-- select * from gir.vw_Tickets


