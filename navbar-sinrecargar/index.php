<!-- index.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo AJAX en PHP</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cargar el contenido inicial
            loadContent('home');

            // Manejar el clic en los enlaces del menú
            $('#menu a').click(function(e) {
                e.preventDefault();
                var opcion = $(this).attr('href');
                loadContent(opcion);
            });

            function loadContent(opcion) {
                $.post('contenido.php', {
                    opcion: opcion
                }, function(data) {
                    $('#content').html(data);
                });
            }
        });
    </script>
</head>

<body>
    <?php include 'header.php'; ?>
    <main id="content">
        <!-- El contenido cargado dinámicamente aparecerá aquí -->
    </main>
</body>

</html>