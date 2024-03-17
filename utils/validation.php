<?php


function filtrado ($datosfiltrar) {
    # Eliminamos espacios en blanco a la izquierda y a la derecha
    $datosfiltrar=trim($datosfiltrar);
    # Eliminamos los backslashes
    $datosfiltrar=stripcslashes($datosfiltrar);
    # Convertimos los caracteres especiales a HTML
    $datosfiltrar=htmlspecialchars($datosfiltrar);

    return $datosfiltrar;
}