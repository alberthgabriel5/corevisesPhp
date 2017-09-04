<script>
    function relizarProceso1(valor1, valor2, valor3, valor4) {
        var parametros = {
            "valor1": valor1,
            "valor2": valor2,
            "valor3": valor3,
            "valor4": valor4

        };
        $.ajax(
                {
                    data: parametros,
                    url: '?controlador=Index&accion=registrarUsuario',
                    type: 'post',
                    beforeSend: function () {
                        $("#resultado").html("Procesando,\n\
                   espere por favor");
                    },
                    success: function (response) {
                        $("#resultado").html(response);
                    }
                }
        $("#valor1").empty();
                );
    }
</script>

<h3 class="animated wow zoomIn" data-wow-delay=".5s">Registrate aquí</h3>
<div class="login-form-grids">

    <input type="text" id="valor1" name="valor1" placeholder="Nombre" required>
    <br>
    <input type="date" id="valor2" name="valor2" placeholder="Edad" required>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
    <input type="email" id="valor3" name="valor3" placeholder="Correo electrónico" required><br>
    <input type="password" id="valor4" name="valor4" placeholder="Contraseña" required>
    <br>
    <button type="submit" href="javascript:;" onclick="relizarProceso1($('#valor1').val(), $('#valor2').val(), $('#valor3').val(), $('#valor4').val());return false;" class="btn btn-warning">Registarse</button>       

</div>


