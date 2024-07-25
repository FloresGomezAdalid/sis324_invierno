<h2>Registrar Vuelta</h2>
<form id="registroVueltaForm">
    <label for="numero_coche">Número de Coche:</label>
    <input type="number" id="numero_coche" name="numero_coche" required>
    <label for="hora_paso">Hora de Paso:</label>
    <input type="time" id="hora_paso" name="hora_paso" required>
    <button type="submit">Registrar Vuelta</button>
</form>

<script>
enviarFormulario('registroVueltaForm', 'procesar_registro_vuelta.php');
</script>