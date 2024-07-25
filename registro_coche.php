<h2>Registrar Coche</h2>
<form id="registroCocheForm">
    <label for="numero">Número de Coche:</label>
    <input type="number" id="numero" name="numero" required>
    <label for="piloto">Piloto:</label>
    <input type="text" id="piloto" name="piloto" required>
    <label for="copiloto">Copiloto:</label>
    <input type="text" id="copiloto" name="copiloto" required>
    <label for="detalles_coche">Detalles del Coche:</label>
    <textarea id="detalles_coche" name="detalles_coche"></textarea>
    <label for="hora_salida">Hora de Salida:</label>
    <input type="time" id="hora_salida" name="hora_salida" required>
    <button type="submit">Registrar Coche</button>
</form>

<script>
enviarFormulario('registroCocheForm', 'procesar_registro_coche.php');
</script>