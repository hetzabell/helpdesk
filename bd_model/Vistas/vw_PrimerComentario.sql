SELECT 
	inc.idIncidencia,
	com.idComentario,
	com.sDescripcion
FROM
	gir.incidencias_t inc,
	gir.comentarios_t com
WHERE
	inc.idIncidencia = com.idIncidencia
ORDER BY
	com.idComentario asc
;