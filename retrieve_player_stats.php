<?php
require_once('connectdb.php');

$player_name = $_POST["pname"];

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

// Run the query.
if ($result = $conn->query("SELECT * FROM player_info where player_name = '$player_name' LIMIT 10") ) {

  if(mysqli_num_rows($result) > 0) {
    // Get the result in to a more usable format.
    $query = array();
    while($query[] = mysqli_fetch_assoc($result));

    array_pop($query);

    //echo '<div class="container">';
    echo '<br><br>';
    echo '<h2> Stats for '. $player_name .':</h2>';
    // Output a dynamic table of the results with column headings.
    echo '<table class="styled-table">';
    echo '<thead>';
    echo '<tr>';
    foreach($query[0] as $key => $value) {
        echo '<th>';
        echo $key;
        echo '</th>';
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach($query as $row) {
        echo '<tr>';
        foreach($row as $column) {
            echo '<td>';
            echo $column;
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    //echo '</div>';
    mysqli_free_result($result);
  } else {
    //echo '<div class="container">';
    echo '<br><br>';
    echo '<h2> No player found with name '. $player_name .'!</h2>';
    //echo '</div';
  }
  
} else {
  echo '<br><br>';
  echo '<h2> Error executing query! </h2>';
}

echo '</div></body></html>';
mysqli_close($conn);