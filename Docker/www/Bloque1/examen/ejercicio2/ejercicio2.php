<!-- 
    @author: Fco Javier Gallego Fernández
    curso: 2ºDAW
-->
<?php
$horario = array(
    "15:15" => array("Lunes" => "DWECL", "Martes" => "DWECL", "Miercoles" => "DWESE", "Jueves" => "DWESE", "Viernes" => "DIW"),
    "16:15" => array("Lunes" => "DWECL", "Martes" => "DWECL", "Miercoles" => "DWESE", "Jueves" => "DWESE", "Viernes" => "DIW"),
    "17:15" => array("Lunes" => "DWECL", "Martes" => "DWECL", "Miercoles" => "DIW", "Jueves" => "DWESE", "Viernes" => "DIW"),
    "18:30" => array("Lunes" => "DWESE", "Martes" => "DAW", "Miercoles" => "DIW", "Jueves" => "EMPRESA", "Viernes" => "HLC"),
    "19:30" => array("Lunes" => "DWESE", "Martes" => "DAW", "Miercoles" => "DIW", "Jueves" => "EMPRESA", "Viernes" => "HLC"),
    "20:30" => array("Lunes" => "DWESE", "Martes" => "DAW", "Miercoles" => "EMPRESA", "Jueves" => "EMPRESA", "Viernes" => "HLC"),
);

echo "<table border='1'>";
echo "<tr><th>Día/Hora</th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th></tr>";
foreach ($horario as $dia => $clases) {
    echo "<tr><td>$dia</td>";
    foreach ($clases as $hora) {
        echo "<td>$hora</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>