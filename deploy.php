<?php
  define( 'LOG_FILE', dirname( __FILE__ ) . '/log/hook_'.date("Ymd").'.log' );
  define( 'LOG_ERR', dirname( __FILE__ ) . '/log/hook-error'.date("Ymd").'.log' );
  define( 'SECRET_KEY', 'tmkn' );

  file_put_contents( LOG_FILE, date( "[Y-m-d H:i:s]" ) . " Start Deploy\n", FILE_APPEND | LOCK_EX );

  $post_data = file_get_contents( 'php://input' );
  $hmac      = hash_hmac( 'sha1', $post_data, SECRET_KEY );
  $payload   = json_decode( $post_data, true );

  if ( isset( $_SERVER['HTTP_X_HUB_SIGNATURE'] ) && $_SERVER['HTTP_X_HUB_SIGNATURE'] === 'sha1=' . $hmac ) {

    if ( $payload['ref'] == 'refs/heads/master' ) {
        exec( 'git pull origin master' );
        file_put_contents( LOG_FILE, date( "[Y-m-d H:i:s]" ) . " " . $_SERVER['REMOTE_ADDR'] . " " . $branch . " " . $payload['commits'][0]['message'] . "\n", FILE_APPEND | LOCK_EX );
    }
  } else {
    file_put_contents( LOG_ERR, date( "[Y-m-d H:i:s]" ) . " invalid access: " . $_SERVER['REMOTE_ADDR'] . "\n", FILE_APPEND | LOCK_EX );
}
