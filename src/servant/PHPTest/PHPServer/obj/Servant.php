<?php

namespace Server\servant\PHPTest\PHPServer\Obj;

interface Servant {
	/**
	 * @param string $paramstr 
	 * @param string $result =out=
	 * @return int
	 */
	public function apply($paramstr,&$result);
	/**
	 * @param string $paramstr 
	 * @param string $result =out=
	 * @return int
	 */
	public function get($paramstr,&$result);
	/**
	 * @param string $paramstr 
	 * @param string $result =out=
	 * @return int
	 */
	public function put($paramstr,&$result);
}

