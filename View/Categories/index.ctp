<div id="header" class="topoHome">
    <?php echo $this->element('site/menu', array('categories' => $categories));?>

    <div class="temas-home relative">
    	<p class="bar-esq"></p>
        <ul>
            <li><a href="temas/desenvolvimento-social" title="" class="des-soci" corHover="#FCBC38"><span class="sprites1 indent block">Desenvolvimento Social</span></a></li>
            <li><a href="temas/infraestrutura-urbana" title="" class="infra-urb" corHover="#FDC43F"><span class="sprites1 indent block">Infraestrutura Urbana</span></a></li>
            <li><a href="temas/socioeconomia" title="" class="socie" corHover="#FED150"><span class="sprites1 indent block">Socioeconomia</span></a></li>
            <li><a href="temas/meio-ambiente-conservacao-e-uso-dos-recursos-naturais" title="" class="meio-amb" corHover="#FFDB5E"><span class="sprites1 indent block">Meio Ambiente, conservação e uso dos recursos naturais</span></a></li>
        </ul>
        <p class="bar-dir"></p>
	</div>
</div>

<div id="conteudo">
    <div class="o-projeto-home left relative">
    	<h2><a href="projeto" title="O Projeto" class="block indent sprites2">O Projeto</a></h2>
    	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    	<a href="" title="Conheça o projeto" class="absolute sprites1 block">Conheça o projeto</a>
		</div>

    <div class="os-indicadores-home left relative">
    	<h2><a href="indicadores" class="block indent sprites2">Os Indicadores</a></h2>
		<!--ul id="mycarousel" class="jcarousel-skin-tango-indicadores">
			<li><img src="img/img-teste-slide.jpg" alt="" />Valorização dos imóveis da região Sul do país</li>
			<li><img src="img/img-teste-slide.jpg" alt="" />Valorização dos imóveis da região Sul do país</li>
			<li><img src="img/img-teste-slide.jpg" alt="" />Valorização dos imóveis da região Sul do país</li>
			<li><img src="img/img-teste-slide.jpg" alt="" />Valorização dos imóveis da região Sul do país</li>
			<li><img src="img/img-teste-slide.jpg" alt="" />Valorização dos imóveis da região Sul do país</li>
			<li><img src="img/img-teste-slide.jpg" alt="" />Valorização dos imóveis da região Sul do país</li>
		</ul-->
		
		<img style="margin:28px 0 0 38px;" src="img/img-teste-slide.jpg" alt="" />
    </div>

    <div class="biblioteca-home left relative">
    	<h2><a href="biblioteca" class="block indent sprites2">Biblioteca</a></h2>
		<ul class="jcarousel-skin-tango-biblioteca">
			<?php
            foreach($documentos as $docs){
                echo '<li><a href="uploads/biblioteca/publicacoes/arquivos/'.$docs['Biblioteca']['archive'].'" target="blank">'.$docs['Biblioteca']['title'].'</a></li>';
            }
            ?>
		</ul>
    </div>
</div>

<?php $this->Html->script(array("jquery.superslides", "jcarousel"), array("inline" => false)); ?>
<script type="text/javascript">
    

    $(document).ready(function(){
        tempoMenor = 5000;
        tempoMaior = 15000;
        var temp1;

        temp2 = setInterval(function(){
            $('.next').trigger('click');
        },tempoMaior);

       
        $('#slides').mouseenter(function(){
            clearInterval(temp1);
            clearInterval(temp2);

            // console.log('mouse dentro do elemento');
            
            temp1 = setInterval(function(){
                $('.next').trigger('click');
            },tempoMenor);
            
            // console.log(tempoMenor);
        });   


        $('#slides').mouseleave(function(){
            clearInterval(temp1);
            clearInterval(temp2);
            
            // console.log('mouse fora do elemento');
            
            setInterval(function(){
                $('.next').trigger('click');
            },tempoMaior);
            
            // console.log(tempoMaior);
        }); 


        $('#slides').superslides({
            hashchange: false
        });

        $('.jcarousel-skin-tango-indicadores').jcarousel({
            scroll: 1
        });
        $('.jcarousel-skin-tango-biblioteca').jcarousel({
            vertical: true,
            scroll: 4
        });
    });
</script>