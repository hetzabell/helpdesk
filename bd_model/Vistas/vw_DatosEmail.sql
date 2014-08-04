Select 
	inc.idIncidencia,
	(SELECT usrS.sNombreCompleto FROM gir.usuarios_t usrS WHERE usrS.idUsuario = inc.idSolicitante) as sSolicitante,
	(SELECT usrSE.sEmail FROM gir.usuarios_t usrSE WHERE usrSE.idUsuario = inc.idSolicitante) as sEmailSolicitante,
	(SELECT usrS.sNombreCompleto FROM gir.usuarios_t usrS WHERE usrS.idUsuario = inc.idAtiende) as sAtiende,
	(SELECT usrSE.sEmail FROM gir.usuarios_t usrSE WHERE usrSE.idUsuario = inc.idAtiende) as sEmailAtiende
FROM
	gir.incidencias_t inc	