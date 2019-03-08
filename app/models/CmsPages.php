<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class CmsPages extends Eloquent 
{
	
		protected $fillable = [
								'page_unique_name',
								'page_name',
								'page_content',
								'default_page_content'
								];
	
	protected $table = 'cms_table';



	public static function fetch_page_content($page_unique_name)
	{

		$page_content = CmsPages::where('page_unique_name',  $page_unique_name)->first();

		return $test_specimen_is_array = (json_decode($page_content->page_content , TRUE)) ;

	}

}


















?>