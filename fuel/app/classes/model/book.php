<?php
use Orm\Model;

class Model_Book extends Model
{
	protected static $_properties = array(
		'id',
		'author',
		'document',
		'year',
		'pages',
		'price',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('author', 'Author', 'required|max_length[255]');
		$val->add_field('document', 'Document', 'required|max_length[255]');
		$val->add_field('year', 'Year', 'required|valid_string[numeric]');
		$val->add_field('pages', 'Pages', 'required|valid_string[numeric]');
		$val->add_field('price', 'Price', 'required');

		return $val;
	}

}
