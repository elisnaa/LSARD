<!--
# Sample information

Patterns:
- Source: filter_input_array_prm__<c>(INPUT_GET)_<array>(<ae_k>(<s>(t),<c>(FILTER_UNSAFE_RAW))) ==> Filters:[]
- Sanitization: gettype_check_prm__<s>(boolean) ==> Filters:[nums, letters, specials]
- Filters complete: Filters:[nums, letters, specials]
- Dataflow: assignment
- Context: sql_apostrophe
- Sink: pdo_query_prm__<$>(pdo)

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init
$pdo = new PDO("mysql:host=mysql;port=3306;dbname=myDB", "username", "password");


# Sample
$tainted = filter_input_array(INPUT_GET, ["t" => FILTER_UNSAFE_RAW]);
$tainted = $tainted["t"];
if(gettype($tainted) == "boolean")
{
  $sanitized = $tainted;
  $dataflow = $sanitized;
  $context = (("SELECT * FROM users WHERE password ='" . $dataflow) . "';");
  $results = $pdo->query($context);
  foreach ($results as $row){
    echo(htmlentities(print_r($row, true)));
  }
}

?>