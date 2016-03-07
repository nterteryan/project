<div class="col-xs-4">
<div class="certificate">
	<div class="header-box">
		<div class="col-xs-12">
			<h6><?php echo  $data->tariff->name ?></h6>
			<hr>
			<p><?php echo  $data->tariff->description ?></p>
			<p>Дата <?php echo  $data->created_date ?></p>
			<p>осталось <b><?php echo  $data->gettimeofday(); ?>дней</b></p>
			<p>создания <span><?= $data->amount ?>$</span></p>
			<div class="unit"><span><?= $data->amount+$data->amount_percent ?>$</span></div>
		</div>
	</div>
</div>
</div>
