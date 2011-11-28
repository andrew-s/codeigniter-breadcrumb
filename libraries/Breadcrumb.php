<?php

// Breadcrumb generator for CodeIgniter
class Breadcrumb
{
	// variables
	public $link_type = ' &gt; '; // must have spaces around it
	public $breadcrumb = array();
	public $output = '';
	
	// clear
	public function clear()
	{
		// clear the breadcrumb library to start again
		$props = array('breadcrumb', 'output');
		
		// loop through
		foreach($props as $val)
		{
			// clear
			$this->$val = null;
		}
		
		// completed
		return true;
	}
	
	// add a "crumb"
	public function add_crumb($title, $url = false)
	{
		// pass into breadcrumb array
		$this->breadcrumb[] = array('title' => $title,
									'url' => $url);
										   
		// completed
		return true;
	}
	
	// change link type
	public function change_link($new_link)
	{
		// change
		$this->link_type = ' ' . $new_link . ' '; // the spaces are added for visual reasons
		
		// completed
		return true;
	}
	
	// produce output
	public function output()
	{
		// define local counter
		$counter = 0;
		
		// loop through breadcrumbs
		foreach($this->breadcrumb as $key=>$val)
		{
			// do we need to add a link?
			if($counter > 0)
			{
				// we do
				$this->output .= $this->link_type;
			}
			
			// are we using a hyperlink?
			if($val['url'])
			{
				// add href tag
				$this->output .= '<a href="' . $val['url'] . '">' . $val['title'] . '</a>';
			} else {
				// don't use hyperlinks
				$this->output .= $val['title'];
			}
			
			// increment counter
			$counter++;
		}
		
		// return
		return $this->output;
	}
}