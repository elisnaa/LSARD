<!--
# Sample information

Patterns:
- Source: _POST ==> Filters:[]
- Sanitization: ctype_cntrl ==> Filters:[nums, letters, specials]
- Filters complete: Filters:[nums, letters, specials]
- Dataflow: assignment
- Context: sql_quotes
- Sink: mysqli_multi_query_prm__<$>(db)

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init
$servername = "mysql";
$username = "username";
$password = "password";
$dbName = "myDB";
$db = new mysqli($servername, $username, $password, $dbName);


# Sample
$tainted = $_POST;
$tainted = $tainted["t"];
if(ctype_cntrl($tainted))
{
  $sanitized = $tainted;
  $dataflow = $sanitized;
  $context = (("SELECT * FROM users WHERE password =\"" . $dataflow) . "\";");
  mysqli_multi_query($db, $context);
  $results = $db->use_result();
  while(($row = $results->fetch_row()))
  {
    echo(htmlentities(print_r($row, true)));
  }
}

?>