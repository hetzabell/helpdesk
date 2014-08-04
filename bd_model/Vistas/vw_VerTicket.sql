SELECT
	inc.idIncidencia,
	CASE inc.iServicio 
		WHEN 1 THEN inc.sAsunto
		ELSE (select serv1.sDescripcion from gir.servicios_t serv1 where serv1.idServicio = inc.iServicio)
	END as sAsunto,
	com.idComentario,
	(SELECT sNombreCompleto FROM gir.usuarios_t autor WHERE autor.idUsuario = com.idUsuario) as sAutorComentario, 
	com.sDescripcion,
	DATE_FORMAT(com.tFechaCaptura,'%d/%m/%Y a las %r') as tFechaCaptura,
	inc.iStatus,
	CASE (SELECT tipo.iTipoUsuario FROM gir.usuarios_t tipo WHERE tipo.idUsuario = com.idUsuario)
		WHEN 1 THEN 'comSA'
		WHEN 2 THEN 'comAdmin'
		WHEN 3 THEN 'panel-default'
		WHEN 4 THEN 'panel-primary'
		ELSE 'UNK'
	END as sTipoComentario,
	(SELECT psa.iMotivoPausa FROM gir.pausas_t psa WHERE psa.idIncidencia = inc.idIncidencia ORDER BY psa.tFechaInicio desc limit 0,1) as iMotivoPausa,
	(SELECT psa.iPausa FROM gir.vw_pausas psa WHERE psa.idIncidencia = inc.idIncidencia ORDER by psa.iPausa desc LIMIT 0,1) as iPausa
FROM
	gir.incidencias_t inc,
	gir.comentarios_t com
WHERE
	inc.idIncidencia = com.idIncidencia
;