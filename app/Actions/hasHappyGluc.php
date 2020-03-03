<?php
namespace App\Actions;

use App\Bar;
class hasHappyGluc
{
	public function execute($b_id)
	{
		$bar = Bar::findOrFail($b_id);
		return $bar->happygluc()->count();
	}
}