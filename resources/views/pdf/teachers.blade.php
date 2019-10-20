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
       <b>Docentes encontrados: {{ count($data['rows'])  }}</b>
   </h3>
   <h4>
       <b>Generado por: {{ $data['user']->email }}</b>
   </h4>

    <br>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Materia(s)</th>
            <th>Instructorias</th>
        </tr>
        </thead>
        <tbody>


        @forelse($data['rows'] as $teacher)

            <tr>
                <td>{{ $teacher->nombre }}</td>
                <td>{{ $teacher->apellido }}</td>
                <td>{{ $teacher->email }}</td>

                <td>@foreach ($teacher->materias as $object)
                        {{ $object->nombre . ', ' }}
                    @endforeach
                </td>
                <td>
                    <span>
                        <b>Cantidad</b> {{ count($teacher->instructorias) }}
                    </span>
                    <br>
                    @foreach ($teacher->instructorias as $object)
                        <span>
                            <b>Ciclo:</b> {{ $object->ciclo->nombre }}
                        </span>
                        <br>
                        <span>
                            <b>Instructor:</b> {{ $object->instructor->nombre }}
                        </span>
                        <hr>
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
