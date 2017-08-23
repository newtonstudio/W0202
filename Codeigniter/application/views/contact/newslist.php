<div class="container">
      <div class="starter-template">
      	<h1>News</h1>

      	<table class="table">
      		<thead>
      			<tr><th>日期</th><th>標題</th><th>內容</th></tr>
      		</thead>
      		<tbody id="container">
      			<tr><td colspan="3"><div align="center"><img src="<?=base_url('assets/ajax-loader.gif')?>"/><br/>Loading...</div></td></tr>
      		</tbody>
      	</table>

      	<script>
      	$(document).ready(function(){

      		$.ajax({
      			method:"GET",
      			url:"<?=base_url('api/getNewsList')?>",
      			dataType:"json"

      		}).done(function(response){

      			//var json = JSON.parse(response);

      			//console.log(response);

      			setTimeout(function(){

      				$("#container").html("");
      				if(response.length > 0) {

	      				for(var i=0; i < response.length; i++) {

	      					var tr = $("<tr>").html('<td>'+response[i].created_date+'</td><td>'+response[i].title+'</td><td>'+response[i].content+'</td>');

	      					$("#container").append(tr);

	      				}

	      			}


      			}, 2000);




      		});

      	});
      	</script>

      </div>
</div>