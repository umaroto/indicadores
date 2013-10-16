<p class="breadCrumbs block left"><a href="">Página inicial</a> » <strong>Os indicadores</strong></p>
<div class="headerInters block left">

    <div class="titPags block">
        <img src="img/icone-biblioteca.jpg" alt="">
        <h2>Biblioteca</h2>
    </div>

    <ul>
        <li><a href="javascript:history.go(-1)" title="Voltar">Voltar</a></li>
        <li><a href="javascript:;" title="A+" id="aumenta_fonte">A+</a></li>
        <li><a href="javascript:;" title="A-" id="reduz_fonte">A-</a></li>
    </ul>
</div>

<div class="pagBiblioteca pgPadrao block left">
    <?php
        $i = 0;
        foreach ($bibliotecas as $biblioteca)
        {
            if ($biblioteca['Bibliotecas']['type'] != 'documentos_ref') continue;
            $i++;
        }

        if ($i > 0):
    ?>
    <p class="destaque">Documentos de referência</p>

    <ul class="listaDocRef">
        <?php foreach ($bibliotecas as $biblioteca): if ($biblioteca['Bibliotecas']['type'] != 'documentos_ref') continue; ?>
            <li><a href="uploads/biblioteca/publicacoes/arquivos/<?= $biblioteca['Bibliotecas']['archive']; ?>" target="_blank"><?php echo $biblioteca['Bibliotecas']['title']; ?></a></li>
        <?php endforeach ?>
    </ul>
    <?php endif; ?>

    <p class="destaque">Publicações</p>

    <div class="publicacoes block left">
        <ul>
            <?php
                // for ($boxs = 1; $boxs <= 8; $boxs++){
                foreach ($bibliotecas as $biblioteca):
                    if ($biblioteca['Bibliotecas']['type'] != 'publicacoes') continue;

                    $path = 'uploads/biblioteca/publicacoes/imagens/';

                    $file = explode('.', $biblioteca['Bibliotecas']['archive']);

                    $img = isset($biblioteca['Bibliotecas']['image']) && is_file($path . $biblioteca['Bibliotecas']['image']) ? $path . $biblioteca['Bibliotecas']['image'] : 'img/img-publicacoes.jpg';

                    echo '<div class="boxs">
                            <img src="'.$img.'" width="209" height="234">
                            <span>'.$biblioteca['Bibliotecas']['title'].'</span>
                            <a href="bibliotecas/getArquivo/'.$file[0].'" title="Faça o download" class="icon-download"> Faça o download</a>
                            <a href="uploads/biblioteca/publicacoes/arquivos/'.$biblioteca['Bibliotecas']['archive'].'" title="Visualize on-line" class="icon-zoom-in-2" target="_blank"> Visualize on-line</a>
                         </div>';
                endforeach;
            ?>
        </ul>
    </div>

    <script>
        $(".publicacoes div").each(function(index){
            var multiplo = (index+1) % 4;
            if(multiplo == 0){
                $(this).css("margin-right","0");
            }
        });

        $('ul.listaDocRef li').removeClass('cor2');
        $('ul.listaDocRef li:even').addClass('cor2');
    </script>


</div>