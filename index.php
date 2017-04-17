<?php
header('content-type: text/html; charset=utf-8');
mb_internal_encoding("UTF-8");

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'function.php');

$host = explode('.', $_SERVER['SERVER_NAME']);
$c = count($host);
$domain = $host[$c-2].'.'.$host[$c-1];
$p = 'http';
if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] !== null) {
	$p .= 's';
}
if ($_SERVER['SERVER_NAME'] !== $domain and $_SERVER['SERVER_NAME'] !== 'www.'.$domain) {
	header('Location: '.$p.'://'.$domain.'/');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			body {
				background: <?= env('BACKGROUNDCOLOR', '#05454C') ?>;
				text-align: center;
				font-family: sans-serif;
				color: <?= env('COLOR', '#ffffff') ?>;
				padding: 50px;
				font-size: 17px;
				padding-top: 100px;
			}
			h1 {
				font-size: 2.4em;
			}
			h2 {
				font-size: 1.7em;
			}
			p {
				font-size: 1em;
			}
			img {
				margin-top: 30px;
			}
		</style>
		<meta name="robots" content="noindex, nofollow">
	</head>
	<body>
		<h1>
			<?= env('HEADLINE', 'COMMING SOON') ?>
		</h1>
		<?= env('TEXT', 'probably ...') ?>
		<h2>
			<?= $_SERVER['SERVER_NAME']; ?>
		</h2>
		<img src="baustelle.php" width="300px"/>
	</body>
</html>
