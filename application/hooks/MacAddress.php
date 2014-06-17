<?php
class MacAddress {
	function __construct() {
		$remote_addr = $_SERVER['REMOTE_ADDR'];
		$proc_file = "/proc/net/arp";
		if (file_exists($proc_file)) {
			foreach (explode("\n", file_get_contents($proc_file)) as $line) {
				$entry = preg_split('/ +/', $line);
				if ($entry[0] == $remote_addr) {
					$_SERVER['MAC_ADDRESS'] = $entry[3];
					return;
				}
			}
		}
	}
}
