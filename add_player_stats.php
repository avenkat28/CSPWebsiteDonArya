<?php
require_once('connectdb.php');

$player_name = $_POST["pname"];
$league = $_POST["lname"];
$team = $_POST["tname"];
$position = $_POST["position"];
$stats = $_POST["stats"];

$sql_str = "INSERT INTO player_info (player_name, team, league, position, stats) 
            VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if ( !mysqli_stmt_prepare($stmt, $sql_str) ) {
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssss", $player_name, $team, $league, $position, $stats);
mysqli_stmt_execute($stmt);

echo '<html>';
echo '<head> 
  <link rel="stylesheet" href="./css/navstyle.css"> 
  <link rel="stylesheet" href="./css/tablestyle.css"> 
  </head>';

echo '<header>
<div class="container">
  <h1 class="logo">FIFA Player Stats</h1>

  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="entry_form.html">Add Player Stats</a></li>
      <li><a href="lookup_form.html">Retrieve Player Stats</a></li>
    </ul>
  </nav>
</div>
</header>';

echo '<body>';
echo '<div class="container">';
echo '<br><br>';
echo '<h2>Player stats for '. $player_name .' successfully saved in the database!</h2>';
echo '</div>';
echo '</body></html>';


mysqli_close($conn);