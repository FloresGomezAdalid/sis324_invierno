<h2>Nueva Carrera</h2>
<form id="nuevaCarreraForm">
    <label for="total_vueltas">Total de Vueltas:</label>
    <input type="number" id="total_vueltas" name="total_vueltas" required>
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required>
    <button type="submit">Crear Carrera</button>
</form>

<script>
enviarFormulario('nuevaCarreraForm', 'procesar_nueva_carrera.php');
</script>