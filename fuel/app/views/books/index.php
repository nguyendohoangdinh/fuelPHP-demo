<h2>Listing <span class='muted'>Books</span></h2>
<br>
<?php if ($books): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>ISBN</th>
			<th>Year</th>
			<th>Pages</th>
			<th>Price</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($books as $item): ?>		<tr>

			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->author; ?></td>
			<td><?php echo $item->document; ?></td>
			<td><?php echo $item->year; ?></td>
			<td><?php echo $item->pages; ?></td>
			<td>R$ <?php echo $item->price; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('books/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('books/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('books/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Books.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('books/create', 'Add new Book', array('class' => 'btn btn-success')); ?>

</p>
<p>
	<?php echo Html::anchor('login/logout', 'Logout', array('class' => 'btn btn-primary')); ?>

</p>
