<!--
# Sample information

Patterns:
- Source: apache_request_headers ==> Filters:[]
- Sanitization: hash_prm__<s>(ripemd160)_<false>() ==> Filters:[nums, letters, specials]
- Filters complete: Filters:[nums, letters, specials]
- Dataflow: assignment
- Context: sql_apostrophe
- Sink: mysqli_prepare_prm__<$>(db)

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
$tainted = apache_request_headers();
$tainted = $tainted["t"];
$sanitized = hash("ripemd160", $tainted, false);
$dataflow = $sanitized;
$context = (("SELECT * FROM users WHERE password ='" . $dataflow) . "';");
$stmt = mysqli_prepare($db, $context);
mysqli_stmt_execute($stmt);
$results = mysqli_stmt_get_result($stmt);
while(($row = $results->fetch_row()))
{
  echo(htmlentities(print_r($row, true)));
}

?>