<?php

foreach ($data["users"] as $user) {
  echo "Username: $user->user_name <br> Email: $user->user_email";
  echo "<br>";
  echo "<hr>";
}
