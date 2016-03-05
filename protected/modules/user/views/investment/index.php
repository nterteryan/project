<div class="col-md-12">
	<hr class="hr-dashed" />
	<div class="row certificate_projects">
		<h2>инвестиций</h2>
		<?php foreach ($tariffs as $tariff) : ?>
			<div class="col-lg-6 col-md-12 ">
				<div class="certificate" id="box-<?php echo $tariff->id; ?>">
					<div class="header-box">
						<h4 class="<?php echo strtolower($tariff->name); ?>"><?= $tariff->name ?> </h4>
						<div class="">количество <span><?= $tariff->amount ?>$</span></div>
						<div class="">срок  <span><?= $tariff->close_month ?> месяц</span></div>
						<div class="unit">процент <span><?= $tariff->percent ?>%</span></div>
					</div>
					<div class="certificate-title"><?php echo $tariff->description; ?></div>
					<div class="text-center">
						<a href="#" data-toggle="modal" data-target="#myModal" data-id="<?php echo $tariff->id; ?>" data-close_month="<?php echo $tariff->close_month; ?>" data-amount="<?php echo $tariff->amount; ?>"data-percent="<?php echo $tariff->percent; ?>" class="btn btn-certificate-choose btn_tariff">Выбрать</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="modal-body">
				<div id="danger">

				</div>
				<div class="form-group ">
					<label class="control-label required" for="sendPin">PIN:<span class="required">*</span></label>
					<input class="form-control"  id="sendPin" type="password">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
				<button type="button" class="btn btn-info btn_modalTr" >Подтвердить</button>
			</div>
		</div>
	</div>
<!-- endModal	-->
</div>