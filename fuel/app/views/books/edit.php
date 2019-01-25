<h2>Editing <span class='muted'>Book</span></h2>
<br>

<?php echo render('books/_form'); ?>
<p>
	<?php echo Html::anchor('books/view/'.$book->id, 'View'); ?> |
	<?php echo Html::anchor('books', 'Back'); ?></p>
