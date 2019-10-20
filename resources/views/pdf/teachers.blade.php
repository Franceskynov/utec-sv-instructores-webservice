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
    <h2>{{ $title }}</h2>

   <h3>
       <b>Docentes encontrados: {{ count($data)  }}</b>
   </h3>

    <br>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Materia(s)</th>
        </tr>
        </thead>
        <tbody>


        @forelse($data as $teacher)

            <tr>
                <td>{{ $teacher->nombre }}</td>
                <td>{{ $teacher->apellido }}</td>
                <td>{{ $teacher->email }}</td>

                <td>@foreach ($teacher->materias as $object)
                        {{ $object->nombre . ', ' }}
                    @endforeach
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
