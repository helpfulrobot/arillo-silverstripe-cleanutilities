<?php
/**
 * A DataObject for Links in CleanTeasers
 *
 * @package cleanutilities
 * @subpackage models
 *
 * @author arillo
 */
class CleanTeaserLink extends DataObject{

	static $db = array(
		'Title'=> 'Text',
		'URL' => 'Text',
		'Type'	=> "Enum('_self,_blank','_blank')"
	);

	static $has_one = array(
		'Reference' => 'CleanTeaser'
	);

	static $searchable_fields = array(
		'Title',
		'URL',
		'Reference.Title'
	);

	static $summary_fields = array(
		'Title',
		'URL',
		'Reference.Title'
	);

	public function getCMSFields_forPopup(){
		return new FieldSet(
			new TextField('Title','Title'),
			new TextField('URL','URL'),
			new DropdownField(
				'Type',
				'Link Type',
			$this->dbObject('Type')->enumValues()
		));
	}
}