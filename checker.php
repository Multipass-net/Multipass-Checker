<?php
function curl_api($method, $protocol)
{
  $curl = curl_init();
  if ($method === 'get') {
    curl_setopt_array($curl, [
      CURLOPT_URL => $protocol . '://api.multipass.net/ping',
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_VERBOSE => 1
    ]);
  } elseif ($method === 'post') {
    curl_setopt_array($curl, [
      CURLOPT_URL => $protocol . '://api.multipass.net/ping',
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_POST  => 1,
      CURLOPT_VERBOSE => 1
    ]);
  }
  return $curl;
}
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>SQweb - Connection Checker</title>
  </head>
  <body>
    GET HTTP: <br>
    <?php
      $curl = curl_api('get', 'http');
      $stderr = fopen('php://temp', 'w+');
      curl_setopt($curl, CURLOPT_STDERR, $stderr);
      $response = curl_exec($curl);
      rewind($stderr);
      $stderrLog = stream_get_contents($stderr);
      if ($response === 1) {
    ?>
    <br> Connection succeeded <br> <?php echo $stderrLog ?>
    <?php } else { ?>
    <br> Connection Failed: <br> <?php echo $stderrLog ?><br>
    <?php
      curl_error($curl);
    } ?>
    <br><br>POST HTTP: <br>
    <?php
      $curl = curl_api('post', 'http');
      $stderr = fopen('php://temp', 'w+');
      curl_setopt($curl, CURLOPT_STDERR, $stderr);
      $response = curl_exec($curl);
      rewind($stderr);
      $stderrLog = stream_get_contents($stderr);
      if ($response === 1) {
    ?>
    <br> Connection succeeded <br><?php echo $stderrLog ?>
    <?php } else { ?>
    <br> Connection Failed: <br> <?php echo $stderrLog ?><br>
    <?php
      curl_error($curl);
    } ?>
    <br><br> GET HTTPS: <br>
    <?php
      $curl = curl_api('get', 'https');
      $stderr = fopen('php://temp', 'w+');
      curl_setopt($curl, CURLOPT_STDERR, $stderr);
      $response = curl_exec($curl);
      rewind($stderr);
      $stderrLog = stream_get_contents($stderr);
      if ($response === 1) {
    ?>
    <br> Connection succeeded <br><?php echo $stderrLog ?>
    <?php } else { ?>
    <br> Connection Failed: <br> <?php echo $stderrLog ?><br>
    <?php
      curl_error($curl);
    } ?>
    <br><br>POST HTTPS:<br>
    <?php
      $curl = curl_api('post', 'https');
      $stderr = fopen('php://temp', 'w+');
      curl_setopt($curl, CURLOPT_STDERR, $stderr);
      $response = curl_exec($curl);
      rewind($stderr);
      $stderrLog = stream_get_contents($stderr);
      if ($response === 1) {
    ?>
    <br> Connection succeeded <br><?php echo $stderrLog ?>
    <?php } else { ?>
    <br> Connection Failed: <br><?php echo $stderrLog ?><br>
    <?php
      curl_error($curl);
    } ?>
  </body>
</html>