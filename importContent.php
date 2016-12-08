<?php

$dir = "/content";
$exec = "php /var/www/w/maintenance/importTextFile.php";

# Handle args if necessary

if ( is_dir($dir) ) {
    if ( $dh = opendir($dir) ) {
        while ( ($entry = readdir($dh)) !== false ) {
			
			if ( is_dir( $dir."/".$entry ) && strpos( $entry, "." ) !== 0 ) {
				if ( $sdh = opendir( $dir."/".$entry ) ) {
					
					while ( ($file = readdir($sdh)) !== false ) {
		
						if ( is_file( $dir."/".$entry."/".$file ) ) {

							$pagename = processFilename( $file );
							
							if ( $entry != "Main" ) {
								$pagename = $entry.":".$pagename;
							}
							
							$filepath = $dir."/".$entry."/".$file;
							
							exec( $exec." --title ".$pagename. " " . $filepath, $output, $retval );
						}
						
					}	
				}
				
				closedir( $sdh );
			}
			
        }
    }
	
	closedir( $dh );
}

function processFilename( $file ) {
	
	$parts = explode( ".", $file );
	
	if ( sizeof( $parts ) > 1 ) {
	
		$ext = array_pop( $parts );
	
	}
	
	return implode( ".", $parts );
	
}