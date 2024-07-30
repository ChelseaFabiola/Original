<!--ventana flotante Horarios-->
<div id="ventanaFlotanteHorario" class="ventana" style="display: none;">
    <div id="modalHorario" class="modal-content">
        <span onclick="closeModal()" class="close">&times;</span>
        <h4 style="text-align: center;">Horarios:</h4>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="text-align: center;">
                                <tr>
                                    <th style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">DÍA</th>
                                    <th style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">HORARIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">Lunes</td>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FEEDDF;">11:30 a.m - 10:30 p.m</td>
                                </tr>
                                <tr>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">Martes</td>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FEEDDF;">11:30 a.m - 10:30 p.m</td>
                                </tr>
                                <tr>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">Miércoles</td>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FEEDDF;">11:30 a.m - 10:30 p.m</td>
                                </tr>
                                <tr>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">Jueves</td>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FEEDDF;">11:30 a.m - 10:30 p.m</td>
                                </tr>
                                <tr>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">Viernes</td>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FEEDDF;">11:30 a.m - 10:30 p.m</td>
                                </tr>
                                <tr>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">Sábado</td>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FEEDDF;">11:30 a.m - 10:30 p.m</td>
                                </tr>
                                <tr>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">Domingo</td>
                                    <td style="border: 7px solid #FFFFFF; background-color: #FEEDDF;">11:30 a.m - 10:30 p.m</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--ventana flotante Horarios-->

<script>
    // Se obtiene el enlace "Horarios" por su ID
    var horarioLink = document.getElementById('horarios-link');

    // Obtener la ventana flotante y el botón de cierre
    var modalHorario = document.getElementById("ventanaFlotanteHorario");
    var closeBtnHorario = modalHorario.querySelector(".close");

    // Abrir la ventana flotante cuando se hace clic en "Horarios"
    horarioLink.addEventListener('click', function() {
        modalHorario.style.display = "block";
    });

    // Cerrar la ventana flotante cuando se hace clic en la "x"
    closeBtnHorario.addEventListener('click', function() {
        modalHorario.style.display = "none";
    });

    // Cerrar la ventana flotante cuando se hace clic fuera de ella
    window.addEventListener('click', function(event) {
        if (event.target == modalHorario) {
            modalHorario.style.display = "none";
        }
    });
</script>