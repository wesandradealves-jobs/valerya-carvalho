<section id="contato" style="background-image:url('./assets/contato.jpg');">
    <div class="wrap">
        <div class="flex">
            <div class="flex30">
                <h3>Entre em contato:</h3>
                <ul>
                    <li><p><a href="mailto:mvaleriacarv@gmail.com">mvaleriacarv@gmail.com</a></p></li>
                    <li><p><i class="ico tel"></i> (11) 99213-3396</p></li>
                    <!-- <li><p><a href="#" title="Linkedin" class="social"></a></p></li> -->
                </ul>
            </div>
            <div class="flex70">
                <form method="POST" name="formulario" action="http://www.valeryacarvalho.com.br/envia.php" class="flex">
                    <span class="flex100"><input required="required" name="txtNome" id="txtNome" value="<?php if(isset($_POST['txtNome'])) echo $_POST['txtNome'];?>" type="text" placeholder="Nome" /></span>

                    <span class="flex50"><input required="required" name="txtTelefone" id="txtTelefone" value="<?php if(isset($_POST['txtTelefone'])) echo $_POST['txtTelefone'];?>" type="tel" placeholder="Telefone" /></span>

                    <span class="flex50"><input required="required" name="txtEmail" id="txtEmail" value="<?php if(isset($_POST['txtEmail']))  echo $_POST['txtEmail'];?>" type="email" placeholder="E-mail" /></span>

                    <span class="flex100"><input required="required" name="txtEmpresa" id="txtEmpresa" value="<?php if(isset($_POST['txtEmpresa']))  echo $_POST['txtEmpresa'];?>" type="text" placeholder="Empresa" /></span>

                    <span class="flex100"><input required="required" name="txtRamo" id="txtRamo" value="<?php if(isset($_POST['txtRamo']))  echo $_POST['txtRamo'];?>" type="text" placeholder="Ramo de Atuação" /></span>

                    <span class="flex100"><textarea required="required" name="txtMensagem" id="txtMensagem" placeholder="Mensagem"><?php if(isset($_POST['txtMensagem'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['txtMensagem']); } else { echo $_POST['txtMensagem']; } } ?></textarea></span>

                    <span class="flex100">
                        <input class="b btn btn_default" name="Enviar" id="Enviar" value="Enviar" type="submit" />
                    </span>
                </form>
                <script>
                    jQuery(document).ready(function(){
                        $('input[name="txtTelefone"]').mask('00 0 0000 0000');
                    });
                </script>
            </div>
        </div>
    </div>
</section>