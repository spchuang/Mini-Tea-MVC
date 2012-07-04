<?php

class Example_auth extends Session
{
	public function __construct()
	{
		parent::__construct();
		

	}

	public function test_authenticate()
	{
		return true;
	}

}
