<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content="{{ $title }}"/>
    <meta charset="UTF-8">
    @include('pdf.partials.customer')
</head>
<body>
@include('pdf.partials.header')
<main>
    <h1> {{ $title }} </h1>
    <h3>
        <b>Instructorias asignadas: {{ count($data)  }}</b>
    </h3>

    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th>Ciclo</th>
            <th>Horario</th>
            <th>Instructor</th>
            <th>Materia</th>
            <th>Aula</th>
            <th>Docente</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @forelse($data as $asignacion)

            <tr>
                <td> {{ $asignacion->ciclo->nombre }} </td>
                <td> {{ $asignacion->horario->nombre_dia }} {{ $asignacion->horario->inicio }} - {{ $asignacion->horario->fin }}</td>
                <td> {{ $asignacion->instructor->nombre  }} </td>
                <td> {{ $asignacion->materia->nombre }} </td>
                <td> {{ $asignacion->aula->codigo }} </td>
                <td> {{ $asignacion->docente->nombre }} </td>
                <td>
                    @if($asignacion->is_enabled == 1)
                        <span style="color:green;">
                            En curso
                        </span>
                    @else
                        <span style="color: red">
                            Terminado
                        </span>
                    @endif
                </td>
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
