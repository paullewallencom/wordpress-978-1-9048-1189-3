<?php
  include("xmlrpc.inc.php");
  $c = new xmlrpc_client("wordpress/xmlrpc.php", "localhost", 80);
  $content['title']="XMLRPC Post";
  $content['description']="Some content posted using MetaWeblog API";
  $content['categories'] = array("frontpage");
  $x = new xmlrpcmsg("metaWeblog.newPost",
                      array(php_xmlrpc_encode("1"),
                      php_xmlrpc_encode("admin"),
                      php_xmlrpc_encode("root"),
                      php_xmlrpc_encode($content),
                      php_xmlrpc_encode("1")));
  $c->return_type = 'phpvals'; 
  $r =$c->send($x);
  if ($r->errno=="0")
  echo "Successfully Posted";
  else {
    echo "There is some error";
    echo "<pre>";
    print_r($r);
    echo "</pre>";
    }
?>