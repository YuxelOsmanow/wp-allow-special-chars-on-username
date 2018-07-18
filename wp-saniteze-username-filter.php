<?php
add_filter( 'sanitize_user', 'mm_sanitize_user', 10, 3);
function mm_sanitize_user( $username, $raw_username, $strict ) {
    $new_username = strip_tags( $raw_username );
    // Kill octets
    $new_username = preg_replace( '|%([a-fA-F0-9][a-fA-F0-9])|', '', $new_username );
    $new_username = preg_replace( '/&.?;/', '', $new_username ); // Kill entities

   // If strict, reduce to ASCII for max portability.
   if ( $strict )
        $new_username = preg_replace( '|[^a-z0-9 _.\-@+]|i', '', $new_username );

    return $new_username;
}
