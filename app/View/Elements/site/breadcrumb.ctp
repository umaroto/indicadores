<p class="breadCrumbs block left">
    <a href="/">Página inicial</a> »
    <?php
    $total = count($breadcrumbs);
    for($x = 0; $x < $total; $x++){
        if($x == $total-1){
            echo '<strong>'.$breadcrumbs[$x]['Category']['title'].'</strong>';
        } else {
            echo '<a href="temas/'.$breadcrumbs[$x]['Category']['slug'].'">'.$breadcrumbs[$x]['Category']['title'].'</a> » ';
        }
    }
    ?>
</p>