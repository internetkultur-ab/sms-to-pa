<?php
// URL:erna ligger i en funktion med ifsats för att kunna ha olika URL:er beroende på vilket nummer som sms tagits emot på.
function get_pa_url($recipient)
{
  if ($recipient == "+1234567890") {
    return "https://url-från-power-automate";
  }
  return false;
}

?>
