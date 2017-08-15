<html>
	<head>
		<title><?=isset($title)?$title:''?></title>
		<link href="<?=base_url('assets/style.css')?>" rel="stylesheet" />
	</head>
	<body>
		<div style="background-color:#f1f1f1; padding:10px">
			<h2>ITEA TECHNOLOGY</h2>
			<a href="<?=base_url('news')?>" <?=isset($pageName)&&$pageName=="news"?'class="active"':''?>>News</a>
			<a href="<?=base_url('about')?>" <?=isset($pageName)&&$pageName=="about"?'class="active"':''?>>About</a>
		</div>