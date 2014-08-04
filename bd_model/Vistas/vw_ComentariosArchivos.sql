SELECT
	inc.idIncidencia,
	com.idComentario,
	arch.sNombreArchivo,
	SUBSTRING(concat(arch.sRuta,arch.sNombreArchivo),INSTR(arch.sRuta, 'adjuntos')) RutaCompleta
FROM
	gir.incidencias_t inc,
	gir.comentarios_t com,
	gir.archivos_t arch 
WHERE
	inc.idIncidencia = com.idIncidencia
	AND arch.idComentario = com.idComentario
	AND inc.idIncidencia = 9	
	;