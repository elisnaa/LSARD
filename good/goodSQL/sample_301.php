<!--
# Sample information

Patterns:
- Source: filter_input_prm__<c>(INPUT_GET)_<s>(t)_<c>(FILTER_SANITIZE_NUMBER_INT) ==> Filters:[letters, specials]
- Sanitization: gettype_check_prm__<s>(string) ==> Filters:[]
- Filters complete: Filters:[letters, specials]
- Dataflow: assignment
- Context: sql_plain
- Sink: sqlite3_query_prm__<$>(db)

State:
- State: Good
- Exploitable: Not found


# Exploit description

-->
<?php
# Init
$db = new SQLite3("/var/www/db/database.db");


# Sample
$tainted = filter_input(INPUT_GET, "t", FILTER_SANITIZE_NUMBER_INT);
if(gettype($tainted) == "string")
{
  $sanitized = $tainted;
  $dataflow = $sanitized;
  $context = (("SELECT * FROM users WHERE pin =" . $dataflow) . ";");
  $results = $db->query($context);
  while(($row = $results->fetchArray()))
  {
    echo(htmlentities(print_r($row, true)));
  }
}

?>