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
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Materia</th>
        </tr>
        </thead>
        <tbody>


        @forelse($data as $teacher)

            <tr>

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
