<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Certificado de Trabajo</title>
</head>
<body>
		<h1 style="text-align:center;">CERTIFICADO DE TRABAJO</h1>

		<p style="text-align:justify;">Deja constancia que el Sr(a) {{ $empleado->name }},laboro en nuestra empresa como <strong>{{ $empleado->position }}</strong> desde el {{ \Carbon\Carbon::parse($empleado->start_date)->format('d/m/Y') }} hasta el {{ date('d/m/Y') }}</p>

		<p style="text-align:justify;">Se expide la presente , a solicitud del interesado para los fines que estime conveniente.</p>

		<br><br><br>
		<p style="text-align: right;" >Lima, {{ date('d') }} de {{ $mes }} del {{ date('Y') }}</p>

		<br><br>

		<p style="text-align: center;">{{ $nombre_comun }}<br>{{ $cargo }}</p>

		<p style="text-align: center;">Firmado Digitalmente<br>imagen del Qr</p>
		
		<h1 style="text-align:center;">CERTIFICADO DE TRABAJO</h1>

		<p style="text-align:justify;">Deja constancia que el Sr(a) {{ $empleado->name }},laboro en nuestra empresa como <strong>{{ $empleado->position }}</strong> desde el {{ \Carbon\Carbon::parse($empleado->start_date)->format('d/m/Y') }} hasta el {{ date('d/m/Y') }}</p>

		<p style="text-align:justify;">Se expide la presente , a solicitud del interesado para los fines que estime conveniente.</p>

		<br><br><br>
		<p style="text-align: right;" >Lima, {{ date('d') }} de {{ $mes }} del {{ date('Y') }}</p>

		<br><br>

		<p style="text-align: center;">{{ $nombre_comun }}<br>{{ $cargo }}</p>

		<p style="text-align: center;">Firmado Digitalmente<br>imagen del Qr</p>
		

</body>
</html>