<?php
require_once "../includes/settings.php";
if (!isset($_POST["id"])) {
  echo "Något gick tyvärr fel. Teknisk info: [Id saknas]";
  die();
}

if (!($pa_url = get_pa_url($_POST["to"]))) {
  echo "Något gick tyvärr fel. Teknisk info: [URL saknas för nummer]";
  die();
}

$data = [
  "sms_direction" => $_POST["direction"],
  "sms_id" => $_POST["id"],
  "sms_from" => $_POST["from"],
  "sms_to" => $_POST["to"],
  "sms_created" => $_POST["created"],
  "sms_message" => $_POST["message"],
];
$options = [
  "http" => [
    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
    "method" => "POST",
    "content" => http_build_query($data),
  ],
];
$context = stream_context_create($options);
$result = file_get_contents($pa_url, false, $context);
if ($result === false) {
  echo "Något gick tyvärr fel. Teknisk info: [PA svarade inte som förväntat]";
} else {
  echo $result;
}

?>
