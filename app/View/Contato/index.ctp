<!-- <div class="pgPadrao pagTemas block left"> -->
<style type="text/css">
    #message-green .green-left{padding-left:22px; color:#496528; font-size: 18px; background: url(img/test-pass-icon.png) 0 3px no-repeat;}
</style>
<p class="breadCrumbs block left"><a href="">Página inicial</a> » <strong>Contato</strong></p>
<div class="headerInters block left">

    <div class="titPags block">
        <img src="img/icone-contato.jpg" alt="">
        <h2>Contato</h2>
    </div>

    <ul>
        <li><a href="javascript:history.go(-1)" title="Voltar">Voltar</a></li>
        <li><a href="javascript:;" title="A+" id="aumenta_fonte">A+</a></li>
        <li><a href="javascript:;" title="A-" id="reduz_fonte">A-</a></li>
    </ul>
</div>

<div class="Pagcontato pgPadrao block left">
    <?php echo $this->Session->flash('flash'); ?>
    <p class="destaque">Fale conosco</p>
    <p>Preencha os campos abaixo para entrar em contato por e-mail.</p>
    <div class="width500Px padding-right30 block left">
        <form class="fomulario-padrao validaForm block left" name="FormCadastro" id="" method="post" action="">
            <div class="width480Px padding-right15 block left">
                <label class="width100Cent">Nome: <input id="Nome" name="nome" type="text" class="campoForm validate[required] text-input"/></label>
                <label class="width100Cent">Email: <input id="E-mail" name="email" type="text" class="validate[required,custom[email]] campoForm"/></label>
                <label class="width100Cent">Assunto: <input id="Assunto" name="assunto" type="text" class="campoForm validate[required] text-input"/></label>
                <label class="width100Cent">Mensagem: <textarea id="Mensagem" name="mensagem" type="text" class="campoForm campoForm validate[required]" style="height:111px;"/></textarea></label>
            </div>

            <br clear="all" /><br />
            <input type="submit" id="acao" class="btPadrao block left" value="ENVIAR" />
        </form>

    </div>

    <div class="width340Px block left">
        <img src="img/img-contato.jpg" class="imgPadrao block left" alt="">
    </div>
    <br clear="all">
</div>

<!-- </div> -->