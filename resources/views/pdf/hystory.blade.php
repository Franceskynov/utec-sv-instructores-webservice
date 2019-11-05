<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content="{{ $title }}"/>
    <meta charset="UTF-8">
    @include('pdf.partials.customer')
</head>
<body>
@include('pdf.partials.header')
<main>
    <h1>Reporte de historial</h1>

   <h3>
       <b>Registros: {{ count($data)  }}</b>
   </h3>

    <br>

    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th>Instructor</th>
            <th>Ciclo</th>
            <th>Materia</th>
            <th>Docente</th>
            <th>Autoevaluaci&oacute;n (5%)</th>
            <th>Docente (15%)</th>
            <th>RRHH (80%)</th>
            <th>Nota Promedio</th>
        </tr>
        </thead>
        <tbody>
        @forelse($data as $asignacion)

            <tr>
                <td>
                    @foreach ($asignacion->instructor as $object)
                        {{ $object->nombre . ', ' }}
                    @endforeach
                </td>
                <td> {{ $asignacion->ciclo->nombre }} </td>
                <td> {{ $asignacion->materia->nombre }} </td>
                <td> {{ $asignacion->docente->nombre }} </td>
                <td> {{ $asignacion->autoevaluacion }} </td>
                <td> {{ $asignacion->evaluacion_docente }} </td>
                <td> {{ $asignacion->evaluacion_rrhh }} </td>
                <td> {{ $asignacion->nota }}</td>
            </tr>
        @empty
            No hay registros que mostrar.
        @endforelse
        </tbody>
    </table>

</main>
<footer>
    El salvador, San Salvador | {{ date('d-m-Y H:i:s') }}
</footer>
</body>
</html>
