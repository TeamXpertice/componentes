<?php
// Establece la zona horaria
date_default_timezone_set('America/Los_Angeles'); // Cambia esto a tu zona horaria

// Calcula el tiempo de finalización en milisegundos desde la época Unix
$endTime = (time() + (5 * 24 * 60 * 60)) * 1000;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>En Mantenimiento</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            background: linear-gradient(45deg, #3498db, #8e44ad);
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 0.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        p {
            font-size: 1.5em;
            margin-bottom: 1em;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        #countdown {
            font-size: 2em;
            color: #f39c12;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            padding: 10px 20px;
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .time-box {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            min-width: 100px;
            text-align: center;
        }

        .time-box span {
            display: block;
        }

        .time-box .number {
            font-size: 2.5em;
            color: #f39c12;
        }

        .time-box .label {
            font-size: 1em;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1>Estamos trabajando en el sitio web</h1>
    <p>El sitio estará disponible en:</p>
    <div id="countdown">
        <div class="time-box">
            <span class="number" id="days">0</span>
            <span class="label">días</span>
        </div>
        <div class="time-box">
            <span class="number" id="hours">0</span>
            <span class="label">horas</span>
        </div>
        <div class="time-box">
            <span class="number" id="minutes">0</span>
            <span class="label">minutos</span>
        </div>
        <div class="time-box">
            <span class="number" id="seconds">0</span>
            <span class="label">segundos</span>
        </div>
    </div>

    <script>
        // Obtiene el tiempo de finalización desde PHP
        var endTime = <?php echo $endTime; ?>;
        var storedEndTime = localStorage.getItem('endTime');

        // Si no hay una hora de finalización almacenada, almacénala
        if (!storedEndTime) {
            localStorage.setItem('endTime', endTime);
            storedEndTime = endTime;
        }

        function updateCountdown() {
            var now = new Date().getTime();
            var distance = storedEndTime - now;

            // Calcula los días, horas, minutos y segundos
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Muestra la cuenta regresiva
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

            // Si la cuenta regresiva termina
            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "¡El sitio ya está disponible!";
                localStorage.removeItem('endTime');
            }
        }

        // Actualiza la cuenta regresiva cada segundo
        var countdownInterval = setInterval(updateCountdown, 1000);

        // Ejecuta la función por primera vez para evitar el retraso de 1 segundo
        updateCountdown();
    </script>
</body>

</html>