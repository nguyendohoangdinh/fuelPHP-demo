<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Author', 'author', array('class'=>'control-label')); ?>

				<?php echo Form::input('author', Input::post('author', isset($book) ? $book->author : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Author')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('ISBN', 'document', array('class'=>'control-label')); ?>

				<?php echo Form::input('document', Input::post('document', isset($book) ? $book->document : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'ISBN')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Year', 'year', array('class'=>'control-label')); ?>

				<?php echo Form::input('year', Input::post('year', isset($book) ? $book->year : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Year')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pages', 'pages', array('class'=>'control-label')); ?>

				<?php echo Form::input('pages', Input::post('pages', isset($book) ? $book->pages : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pages')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Price', 'price', array('class'=>'control-label')); ?>

				<?php echo Form::input('price', Input::post('price', isset($book) ? $book->price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Price')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>