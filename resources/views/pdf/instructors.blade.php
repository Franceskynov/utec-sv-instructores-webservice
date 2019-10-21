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
    <h3>{{ $title }}</h3>
    <h4>
        <b>Instructores encontrados: </b> {{ count($data['rows'])  }}, {{ $data['subtitle'] }}
    </h4>

    <br>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Cum</th>
            <th>Carrera</th>
            <th>Carnet</th>
            <th>Capacitaciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse($data['rows'] as $instructor)

            <tr>
                <td>{{ $instructor->nombre }}</td>
                <td>{{ $instructor->cum }}</td>
                <td>{{ $instructor->carrera }}</td>
                <td>{{ $instructor->carnet }}</td>
                <td>
                    @if(count($instructor->capacitaciones) > 0)
                        @foreach ($instructor->capacitaciones as $object)
                            {{ $object->nombre . ', ' }}
                        @endforeach
                    @else
                        <b style="color: red;">No tiene capacitaciones</b>
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
