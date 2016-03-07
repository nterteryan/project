<div class="col-md-12">
	<hr class="hr-dashed" />
	<div class="row certificate_projects">
		<h2>Мой инвестиций</h2>
		<div class="row">
			<div class="col-xs-12">
				<?php 
				 $this->widget('zii.widgets.CListView', array(
				        'dataProvider'=>$dataProvider,
				        'itemView'=>'_userTariff',
				));
				?>
			</div>
		</div>	
	</div>
</div>