<!--
# Sample information

Patterns:
- Source: filter_input_array_prm__<c>(INPUT_GET)_<array>(<ae_k>(<s>(t),<c>(FILTER_SANITIZE_NUMBER_FLOAT))) ==> Filters:[letters, specials]
- Sanitization: in_array_prm__<$>(legal)_<true>() ==> Filters:[nums, letters, specials]
- Filters complete: Filters:[nums, letters, specials]
- Dataflow: assignment
- Context: sql_apostrophe
- Sink: pg_send_query_prm__<$>(db)

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init
$db = pg_pconnect("host=postgres-server port=5432 user=postgres password=postgres123 dbname=myDB");

$legal = ["safe1", "safe2"];


# Sample
$tainted = filter_input_array(INPUT_GET, ["t" => FILTER_SANITIZE_NUMBER_FLOAT]);
$tainted = $tainted["t"];
if(in_array($tainted, $legal, true))
{
  $sanitized = $tainted;
  $dataflow = $sanitized;
  $context = (("SELECT * FROM users WHERE password ='" . $dataflow) . "';");
  pg_send_query($db, $context);
  $result = pg_get_result($db);
  while(($row = pg_fetch_row($result)))
  {
    echo(htmlentities(print_r($row, true)));
  }
}

?>