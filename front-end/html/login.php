<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
  require '../../vendor/autoload.php';

  //$settings = ['settings' => ['addContentLengthHeader' => false]];
  $app = new Slim\App();

  $app->post('/', function ($request, $response) {
    $userlogin = $request->getParam('username');
    $userpass = $request->getParam('password');

    try { 
      require_once('database.php');

      $query = "SELECT * from Users where username='$userlogin'";

      $result = $mysqli->query($query);

      while ($row = $result->fetch_assoc()){
        $userdata[] = $row;
      }
      
      if ($userdata[0]['password'] == $userpass) {
        $id = "m00d13" . uniqid();
        session_id($id);
        session_start();
      }
      else {
        echo "nope";
      }

    } 
    catch(Exception $e) {
      echo "Something went wrong!";
    }

    
  });

  $app->run();

?>

<script type="text/javascript">
window.location.href = '/COMP307/front-end/html/index-reg.php';
</script>