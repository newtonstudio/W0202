
		<h1>News Manage</h1>

		<ul>
		<?php
		if(!empty($dataList)) {
			foreach($dataList as $v) {
				echo '<li><a href="'.base_url('news_detail/'.$v['id'].'/'.urlencode($v['title'])).'">'.$v['title'].'</a></li>';
			}
		}
		?>
		</ul>

