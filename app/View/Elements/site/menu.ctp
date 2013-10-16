<h1><a href="index.php" title="Indicadores Alphaville">Indicadores Alphaville</a></h1>
<ul id="nav" class="menu absolute block">
    <li><a href="home" title="HOME" class="bt-home block indent sprites1">HOME</a></li>
    <li><?php echo $this->Html->link('O PROJETO', array('controller' => 'projeto', 'action' => 'index'), array('class' => 'bt-o-projeto')); ?></li>
	<li><a href="#" title="TEMAS" class="bt-temas sub">TEMAS</a>
		<ul>
			<?php
            foreach($categories as $category):
                echo '<li><a href="temas/'.$category['Category']['slug'].'" >'.$category['Category']['title'].'</a></li>';
            endforeach;
            ?>
		</ul>
	</li>
    <li><?php echo $this->Html->link('OS INDICADORES', array('controller' => 'indicadores', 'action' => 'index'), array('class' => 'bt-os-indicadores')); ?></li>
    <li><?php echo $this->Html->link('BIBLIOTECA', array('controller' => 'biblioteca', 'action' => 'index'), array('class' => 'bt-biblioteca')); ?></li>
    <li><?php echo $this->Html->link('CONTATO', array('controller' => 'contato', 'action' => 'index'), array('class' => 'bt-contato')); ?></li>
</ul>

<div id="slides" class="relative">
    <nav class="slides-navigation">
        <a href="#" class="next" title="Próxima">Próxima</a>
        <a href="#" class="prev" title="Anterior">Anterior</a>
    </nav>

    <div class="slides-container">
        <?php foreach ($banners as $banner): if ($banner['Banners']['link']): ?>
            <a href="<?= $banner['Banners']['link']; ?>" target="_blank">
                <img src="uploads/banners/<?php echo $banner['Banners']['image']; ?>" width="1920" height="564">
            </a>
        <?php else: ?>
            <img src="uploads/banners/<?php echo $banner['Banners']['image']; ?>" width="1920" height="564">
        <?php endif; endforeach; ?>
    </div>
</div>