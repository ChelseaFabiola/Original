
<style>
    /*estilos para ventanaContactenos*/
hr {
  height: 4px; /* Altura del hr */
  border: none; /* Elimina el borde predeterminado */
  background-color: #6d2c17b6; /* Color de fondo del hr */
  margin-top: 0%; /* Márgenes superior e inferior */
}
</style>
<!--ventana flotante Contactos-->
<div id="ventanaFlotante" class="modal">
            <div class="modal-content">
                <span onClick = "closeModal()" class="close">&times;</span>
                <h4 style="text-align: center;">Contáctanos en:</h4>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <img class="imgVentana" src="img/burguesia.jpeg" alt="BP La Burguesía del Pueblo" width="100px" height="150px">
                        </div>
                        
                        <div class="col-7">
                            <br>
                            <div class="contact-info">
                                <img src="img/whatsapp.png" alt="WhatsApp" class="contact-icon"<p>983 120 8934</p>                           
                            </div>
                            <div class="contact-info">
                                <img src="img/gmail.png" alt="Gmail" class="contact-icon"<p>laburguesia.bacalar@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--ventana flotante contactos-->
        <script>
            const modalContactos = document.getElementById("ventanaFlotante");
            
            function closeModal(){     
                modalContactos.style.display = "none";
            }
      

        </script>