<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<a class="btn btn-primary" href="/books">Books</a>
			<a class="btn btn-primary" href="/users">Users</a>
		</div>
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
			<hr>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-12">
<?php echo $content; ?>
		</div>
		<div class="col-md-3"></div>
<footer class="page-footer font-small blue pt-4">
    <div class="container-fluid text-center text-md-left">
      <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
        </div>   
    </div>
    <br>
    <div class="footer-copyright text-center py-3">© 2018 Copyright: Mateus Rovari<br><br>
      <a href="https://www.linkedin.com/in/mateus-rovari-80a47714b/">LinkedIn </a>
      <a href="https://github.com/MtsRovari">| GitHub</a>
    </div>
  </footer>
	</div>
</body>
</html>
