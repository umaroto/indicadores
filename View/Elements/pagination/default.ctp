<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
	<tr>
		<td>
		<?php
			echo $this->Paginator->prev('', array('class' => 'page-left'), null, array('class' => 'page-left'));
			echo $this->Paginator->counter(array('format' => __('<div id="page-info">Page <strong>{:page}</strong> / {:pages}</div>')));
			echo $this->Paginator->next('', array('class' => 'page-right'), null, array('class' => 'page-right'));

			$count = $this->Paginator->counter(array('format' =>'{:pages}'));
			$actual = $this->Paginator->counter(array('format' =>'{:page}'));
		?>
		<td>
			<input id="combo_page" type="text" autocomplete="off" readonly="" tabindex="0" value="<?php echo $actual;?>">
			<div id="combo_page_container" class="selectbox-wrapper2" style="display: none; width: 130px;">
				<ul>
					<li id="combo_page_input_" class=" ">Páginas</li>
					<?php
					for($i=1; $i<=$count;$i++):
						$s = $i == $this->Paginator->counter(array('format' =>'{:page}')) ? 'selected2' : '';
						echo $this->Paginator->link('<li id="combo_page_input_'.$i.'" class="'.$s.'">'.$i.'</li>', array('page' => $i), array('escape' => false)).'</li>';
					endfor;
					?>
				</ul>
			</div>
		</td>
	</tr>
</table>
<div class="clear"></div>