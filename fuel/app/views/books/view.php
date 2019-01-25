<h2>Viewing <span class='muted'>#<?php echo $book->id; ?></span></h2>

<p>
	<strong>Author:</strong>
	<?php echo $book->author; ?></p>
<p>
	<strong>ISBN:</strong>
	<?php echo $book->document; ?></p>
<p>
	<strong>Year:</strong>
	<?php echo $book->year; ?></p>
<p>
	<strong>Pages:</strong>
	<?php echo $book->pages; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $book->price; ?></p>

<?php echo Html::anchor('books/edit/'.$book->id, 'Edit'); ?> |
<?php echo Html::anchor('books', 'Back'); ?>