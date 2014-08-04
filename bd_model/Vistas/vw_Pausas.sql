SELECT 
	psa.idIncidencia,
	psa.tFechaInicio,
	psa.tFechaFinal,
	TIMEDIFF(psa.tFechaFinal,psa.tFechaInicio) as DIFFHoras_dePausas,
	psa.iPausa,
	psa.iMotivoPausa,
	mps.sDescripcion
FROM
	gir.pausas_t psa,
	gir.motivopausas_t mps
WHERE
	psa.iMotivoPausa = mps.idMotivoPausa
	AND psa.idIncidencia = 1