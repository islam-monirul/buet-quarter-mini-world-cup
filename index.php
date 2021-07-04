<?php
     try{
          $dbcon = new PDO("mysql:host=localhost:3306;dbname=devmypbo_buetQ_mini_wc;","root","");
          $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
          <!DOCTYPE html>
          <html lang="en">
          <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">

               <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

               <link rel="preconnect" href="https://fonts.googleapis.com">
               <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
               <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

               <link rel="stylesheet" href="assets/style.css">

               <link rel="shortcut icon" type="image/png" href="assets/img/logo.png">

               <title>BUET Quarter Mini World Cup 2021</title>
          </head>
          <body>
               <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <div class="container">
                         <a class="navbar-brand" href="index.php">
                              <img src="assets/img/logo.png" alt="" width="72" height="72" class="d-inline-block align-text-top">
                         </a>
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                         </button>
                         <div class="collapse navbar-collapse" id="navbarNavDropdown">
                              <ul class="navbar-nav">
                                   <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="#standings-section">Standings</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" href="#top-performer">Top Performer</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" href="#teams">Teams</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" href="#fixture">Fixtures & Results</a>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </nav>

               <section class="hero" id="hero-section">
                    <div class="container">
                         <div class="row">
                              <h3><span>BUET Quarter</span> Mini World Cup 2021</h3>
                         </div>                         
                         <div class="row heroRow2">
                              <div class="col">
                                   <a href="#teams" class="btn m-2">
                                        <img src="assets/img/bra.png" alt="">
                                   </a>
                                   <a href="#teams" class="btn m-2">
                                        <img src="assets/img/arg.png" alt="">
                                   </a>
                                   <a href="#teams" class="btn m-2">
                                        <img src="assets/img/fra.png" alt="">
                                   </a>
                                   <a href="#teams" class="btn m-2">
                                        <img src="assets/img/ger.png" alt="">
                                   </a>
                                   <a href="#teams" class="btn m-2">
                                        <img src="assets/img/por.png" alt="">
                                   </a>
                                   <a href="#teams" class="btn m-2">
                                        <img src="assets/img/spa.png" alt="">
                                   </a>
                                   <a href="#teams" class="btn m-2">
                                        <img src="assets/img/bel.png" alt="">
                                   </a>
                              </div>
                         </div>
                    </div>
               </section>
               <section id="standings-section">
                    <div class="container">
                         <div class="row">
                              <h3>STANDINGS</h3>
                              <div class="col table-responsive">
                                   <?php
                                        $standQ = "SELECT *
                                                       FROM standings JOIN teams
                                                       ON standings.team_id = teams.team_id
                                                       ORDER BY standings.points DESC, standings.gd DESC";

                                        $standing = $dbcon->query($standQ);
                                        $finalStanding = $standing->fetchAll();
                                        $standingPosition = 1;
                                   ?>

                                   <table class="table table-striped" id="standing-table">
                                        <thead>
                                             <tr>
                                                  <th scope="col">Pos</th>
                                                  <th scope="col">Team Name</th>
                                                  <th scope="col">MP</th>
                                                  <th scope="col">W</th>
                                                  <th scope="col">L</th>
                                                  <th scope="col">D</th>
                                                  <th scope="col">GD</th>
                                                  <th scope="col">Pts</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalStanding as $standingData){
                                        ?>
                                             <tr>
                                                  <th scope="row"><?php echo $standingPosition ?></th>
                                                  <th><?php echo $standingData['team_name'] ?></th>
                                                  <td><?php echo $standingData['played'] ?></td>
                                                  <td><?php echo $standingData['won'] ?></td>
                                                  <td><?php echo $standingData['lose'] ?></td>
                                                  <td><?php echo $standingData['draw'] ?></td>
                                                  <td><?php echo $standingData['gd'] ?></td>
                                                  <td><?php echo $standingData['points'] ?></td>
                                             </tr>
                                        <?php
                                             $standingPosition++;

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </section>

               <section id="top-performer">
                    <div class="container">
                         <div class="row">
                              <h3>TOP SCORER</h3>
                              <div class="col table-responsive">
                                   <?php
                                        $topscorersQ = "SELECT *
                                                       FROM player JOIN teams
                                                       ON player.team_id = teams.team_id
                                                       JOIN standings
                                                       ON standings.team_id = teams.team_id
                                                       ORDER BY goals DESC LIMIT 0,2";

                                        $topscorers = $dbcon->query($topscorersQ);
                                        $finaltopscorers = $topscorers->fetchAll();
                                        $scorerPosition = 1;
                                   ?>

                                   <table class="table table-striped" id="top-scorer">
                                        <thead>
                                             <tr>
                                                  <th scope="col">Pos</th>
                                                  <th scope="col">Player Name</th>
                                                  <th scope="col">Team</th>
                                                  <th scope="col">MP</th>
                                                  <th scope="col">Goals</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finaltopscorers as $scorerData){
                                        ?>
                                             <tr>
                                                  <th scope="row"><?php echo $scorerPosition ?></th>
                                                  <td><?php echo $scorerData['player_name'] ?></td>
                                                  <th>
                                                       <img src="assets/img/<?php echo $scorerData['flag'] ?>" height="40px" width="40px">
                                                       <?php echo $scorerData['team_name'] ?>
                                                  </th>
                                                  <td><?php echo $scorerData['played'] ?></td>
                                                  <td><?php echo $scorerData['goals'] ?></td>
                                             </tr>
                                        <?php
                                             $scorerPosition++;

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>
                         </div>

                         <div class="row mt-5">
                              <h3>MOST ASSISTS</h3>
                              <div class="col table-responsive">
                                   <?php
                                        $assistsQ = "SELECT *
                                                       FROM player JOIN teams
                                                       ON player.team_id = teams.team_id
                                                       JOIN standings
                                                       ON standings.team_id = teams.team_id
                                                       WHERE player.pos = 0
                                                       ORDER BY assists DESC LIMIT 0,2";

                                        $assists = $dbcon->query($assistsQ);
                                        $finalassists = $assists->fetchAll();
                                        $assistsPosition = 1;
                                   ?>

                                   <table class="table table-striped" id="top-scorer">
                                        <thead>
                                             <tr>
                                                  <th scope="col">Pos</th>
                                                  <th scope="col">Player Name</th>
                                                  <th scope="col">Team</th>
                                                  <th scope="col">MP</th>
                                                  <th scope="col">Assists</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalassists as $assistsData){
                                        ?>
                                             <tr>
                                                  <th scope="row"><?php echo $assistsPosition ?></th>
                                                  <td><?php echo $assistsData['player_name'] ?></td>
                                                  <th>
                                                       <img src="assets/img/<?php echo $assistsData['flag'] ?>" height="40px" width="40px">
                                                       <?php echo $assistsData['team_name'] ?>
                                                  </th>
                                                  <td><?php echo $assistsData['played'] ?></td>
                                                  <td><?php echo $assistsData['assists'] ?></td>
                                             </tr>
                                        <?php
                                             $assistsPosition++;

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>
                         </div>

                         <div class="row mt-5">
                              <h3>MOST CLEAN SHEETS</h3>
                              <div class="col table-responsive">
                                   <?php
                                        $csQ = "SELECT *
                                                  FROM player JOIN teams
                                                  ON player.team_id = teams.team_id
                                                  JOIN standings
                                                  ON standings.team_id = teams.team_id
                                                  WHERE player.pos = 1
                                                  ORDER BY clean_sheets DESC LIMIT 0,2";

                                        $cs = $dbcon->query($csQ);
                                        $finalcs = $cs->fetchAll();
                                        $csPosition = 1;
                                   ?>

                                   <table class="table table-striped" id="top-scorer">
                                        <thead>
                                             <tr>
                                                  <th scope="col">Pos</th>
                                                  <th scope="col">Player Name</th>
                                                  <th scope="col">Team</th>
                                                  <th scope="col">MP</th>
                                                  <th scope="col">Clean sheets</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalcs as $csData){
                                        ?>
                                             <tr>
                                                  <th scope="row"><?php echo $csPosition ?></th>
                                                  <td><?php echo $csData['player_name'] ?></td>
                                                  <th>
                                                       <img src="assets/img/<?php echo $csData['flag'] ?>" height="40px" width="40px">
                                                       <?php echo $csData['team_name'] ?>
                                                  </th>
                                                  <td><?php echo $csData['played'] ?></td>
                                                  <td><?php echo $csData['clean_sheets'] ?></td>
                                             </tr>
                                        <?php
                                             $csPosition++;

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </section>

               <section id="teams">
                    <div class="container">
                         <div class="row">
                              <h3>PARTICIPATING TEAMS</h3>
                              <!-- brazil -->
                              <div class="col-sm-4 mb-3 table-responsive">
                                   <?php
                                        $teamQ = "SELECT player_name
                                                  FROM player JOIN teams
                                                  ON player.team_id = teams.team_id
                                                  WHERE teams.team_id = 1";

                                        $team = $dbcon->query($teamQ);
                                        $finalteam = $team->fetchAll();
                                   ?>

                                   <table class="table table-striped" id="team-table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" style="background-color: #40AE49;">
                                                       <img src="assets/img/bra.png" height="40px" width="40px">
                                                       Brazil
                                                  </th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalteam as $teamData){
                                        ?>
                                             <tr>
                                                  <th><?php echo $teamData['player_name'] ?></th>
                                             </tr>
                                        <?php

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>

                              <!-- argentina -->
                              <div class="col-sm-4 mb-3 table-responsive">
                                   <?php
                                        $teamQ = "SELECT player_name
                                                  FROM player JOIN teams
                                                  ON player.team_id = teams.team_id
                                                  WHERE teams.team_id = 2";

                                        $team = $dbcon->query($teamQ);
                                        $finalteam = $team->fetchAll();
                                   ?>

                                   <table class="table table-striped" id="team-table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" style="background-color: #229CD7;">
                                                       <img src="assets/img/arg.png" height="40px" width="40px">
                                                       Argentina
                                                  </th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalteam as $teamData){
                                        ?>
                                             <tr>
                                                  <th><?php echo $teamData['player_name'] ?></th>
                                             </tr>
                                        <?php

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>


                              <!-- germany -->
                              <div class="col-sm-4 mb-3 table-responsive">
                                   <?php
                                        $teamQ = "SELECT player_name
                                                  FROM player JOIN teams
                                                  ON player.team_id = teams.team_id
                                                  WHERE teams.team_id = 3";

                                        $team = $dbcon->query($teamQ);
                                        $finalteam = $team->fetchAll();
                                   ?>

                                   <table class="table table-striped" id="team-table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" style="background-color: #050808;">
                                                       <img src="assets/img/ger.png" height="40px" width="40px">
                                                       Germany
                                                  </th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalteam as $teamData){
                                        ?>
                                             <tr>
                                                  <th><?php echo $teamData['player_name'] ?></th>
                                             </tr>
                                        <?php

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>

                              <!-- portugal -->
                              <div class="col-sm-4 mb-3 table-responsive">
                                   <?php
                                        $teamQ = "SELECT player_name
                                                  FROM player JOIN teams
                                                  ON player.team_id = teams.team_id
                                                  WHERE teams.team_id = 4";

                                        $team = $dbcon->query($teamQ);
                                        $finalteam = $team->fetchAll();
                                   ?>

                                   <table class="table table-striped" id="team-table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" style="background-color: #2D6A35;">
                                                       <img src="assets/img/por.png" height="40px" width="40px">
                                                       Portugal
                                                  </th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalteam as $teamData){
                                        ?>
                                             <tr>
                                                  <th><?php echo $teamData['player_name'] ?></th>
                                             </tr>
                                        <?php

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>


                              <!-- france -->
                              <div class="col-sm-4 mb-3 table-responsive">
                                   <?php
                                        $teamQ = "SELECT player_name
                                                  FROM player JOIN teams
                                                  ON player.team_id = teams.team_id
                                                  WHERE teams.team_id = 5";

                                        $team = $dbcon->query($teamQ);
                                        $finalteam = $team->fetchAll();
                                   ?>

                                   <table class="table table-striped" id="team-table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" style="background-color: #304296;">
                                                       <img src="assets/img/fra.png" height="40px" width="40px">
                                                       France
                                                  </th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalteam as $teamData){
                                        ?>
                                             <tr>
                                                  <th><?php echo $teamData['player_name'] ?></th>
                                             </tr>
                                        <?php

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>


                              <!-- spain -->
                              <div class="col-sm-4 mb-3 table-responsive">
                                   <?php
                                        $teamQ = "SELECT player_name
                                                  FROM player JOIN teams
                                                  ON player.team_id = teams.team_id
                                                  WHERE teams.team_id = 6";

                                        $team = $dbcon->query($teamQ);
                                        $finalteam = $team->fetchAll();
                                   ?>

                                   <table class="table table-striped" id="team-table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" style="background-color: #B6202F;">
                                                       <img src="assets/img/spa.png" height="40px" width="40px">
                                                       Spain
                                                  </th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalteam as $teamData){
                                        ?>
                                             <tr>
                                                  <th><?php echo $teamData['player_name'] ?></th>
                                             </tr>
                                        <?php

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>


                              <!-- belgium -->
                              <div class="col-sm-4 mb-3 table-responsive">
                                   <?php
                                        $teamQ = "SELECT player_name
                                                  FROM player JOIN teams
                                                  ON player.team_id = teams.team_id
                                                  WHERE teams.team_id = 7";

                                        $team = $dbcon->query($teamQ);
                                        $finalteam = $team->fetchAll();
                                   ?>

                                   <table class="table table-striped" id="team-table">
                                        <thead>
                                             <tr>
                                                  <th scope="col" style="background-color: #DC2229;">
                                                       <img src="assets/img/spa.png" height="40px" width="40px">
                                                       Belgium
                                                  </th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalteam as $teamData){
                                        ?>
                                             <tr>
                                                  <th><?php echo $teamData['player_name'] ?></th>
                                             </tr>
                                        <?php

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>

                         </div>
                    </div>
               </section>

               <section id="fixture">
                    <div class="container">
                         <div class="row">
                              <h3>FIXTURES AND RESULTS</h3>
                              <div class="col table-responsive">
                                   <?php
                                        $frQ = "SELECT *
                                                       FROM fixture";

                                        $fr = $dbcon->query($frQ);
                                        $finalfr = $fr->fetchAll();
                                        $frNo = 1;
                                   ?>

                                   <table class="table table-striped" id="top-scorer">
                                        <thead>
                                             <tr>
                                                  <th scope="col">Match</th>
                                                  <th scope="col">Team Name</th>
                                                  <th scope="col"></th>
                                                  <th scope="col">Team Name</th>
                                                  <th scope="col"></th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             foreach($finalfr as $frData){
                                        ?>
                                             <tr>
                                                  <td scope="row"><?php echo $frNo ?></td>
                                                  <th><?php echo $frData['team1name'] ?></th>
                                                  <th><?php echo $frData['team1goal'] ?></th>
                                                  <th><?php echo $frData['team2name'] ?></th>
                                                  <th><?php echo $frData['team2goal'] ?></th>
                                             </tr>
                                        <?php
                                             $frNo++;

                                             }
                                        ?>     
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </section>

               <footer>
                    <p>Designed & Developed by <a href="https://devmonir.xyz/">Monirul Islam</a></p>
               </footer>

               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
          </body>
          </html>
<?php
     }
     catch(PDOException $ex){
     ?>
        <script>
            window.location.assign('customerLogin.php');
        </script>
     <?php
     }
?>