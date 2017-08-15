<div class="container">
    <div class="starter-template">
		<table class="table table-bordered">
			<thead>
				<tr><th>Created Date</th><th>Name</th><th>Email</th><th>Message</th><th></th></tr>
			</thead>
			<tbody>
				<?php
				if(!empty($dataList)) {
					foreach($dataList as $v) {
				?>
				<tr>
					<td><?=$v['created_date']?></td>
					<td><?=$v['name']?></td>
					<td><?=$v['email']?></td>
					<td><?=$v['message']?></td>
					<td>
						<a href="<?=base_url('edit/'.$v['id'])?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>

						<a href="<?=base_url('copy/'.$v['id'])?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-duplicate"></i></a>

						<a href="javascript:toDelete('<?=base_url('delete/'.$v['id'])?>');" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
				<?php
					}
				}
				?>
			</tbody>

		</table>	

		<?=$pagination?>
	</div>
</div>
<script>
function toDelete(url){

	var c = confirm("Are you sure?");
	if(c) {
		location.href=url;
	}

}
</script>