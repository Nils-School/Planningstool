<?php

function getAllGames(){
   try {
       $conn=openDatabaseConnection();
       $stmt = $conn->prepare("SELECT * FROM games"); 
       $stmt->execute();
       $result = $stmt->fetchAll();
   }
   catch(PDOException $e){
       echo "Connection failed: " . $e->getMessage();
   }
   $conn = null;
   return $result;
}

function getGame($id){
    try {
        $conn=openDatabaseConnection();
        $stmt = $conn->prepare("SELECT * FROM games WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
 }

 function createPlan($data){
    try{
        $conn=openDatabaseConnection();
        $stmt = $conn->prepare("INSERT INTO personen (date,start,explainer,players,game) VALUES (:date, :start, :explainer, :players, :game)");
        $stmt->execute(array(
            ':date' => $data['date'],
            ':start' => $data['start'],
            ':explainer' => $data['explainer'],
            ':players' => $data['players'],
            ':game' => $data['game']

        ));
       }
       catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        }
        $conn = null; 
 }

function getAllPlannedGames(){
     try {
         $conn=openDatabaseConnection();
         $stmt = $conn->prepare("SELECT * FROM personen");
         $stmt->execute();
         $result = $stmt->fetchAll();
     }
     catch(PDOException $e){  
         echo "Connection failed: " . $e->getMessage();
     }
     $conn = null;
     return $result;
  }

function GetPlannedGame($id){
     try {
         $conn=openDatabaseConnection();
         $stmt = $conn->prepare("SELECT * FROM personen WHERE id = :id");
         $stmt->bindParam(':id', $id);
         $stmt->execute();
         $result = $stmt->fetch();
     }
     catch(PDOException $e){
         echo "Connection failed: " . $e->getMessage();
     }
     $conn = null;
     return $result;
  }
 
function ReadPlannedGame(){
  try {
    $conn=openDatabaseConnection();
    $stmt = $conn->prepare("SELECT games.*,personen.* FROM games INNER JOIN personen ON personen.game = games.id WHERE personen.game = games.id ORDER BY personen.start DESC");
    $stmt->execute();
    $result = $stmt->fetchAll();
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
return $result;
}

function CountAllPlannedGames(){
    try {
        $conn=openDatabaseConnection();
        $stmt = $conn->prepare("SELECT COUNT(DISTINCT game) AS amount FROM personen");
        $stmt->execute();
        $result = $stmt->fetch();
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
}
function readDistinct($data){
    try {
        $conn=openDatabaseConnection();
        $stmt = $conn->prepare("SELECT game FROM `personen` WHERE game = :game");
        $stmt->bindParam(':game', $data['game']);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
}
function tempDelgame($data){
    try{
        $conn=openDatabaseConnection();          
        $stmt = $conn->prepare("UPDATE personen SET game= NULL WHERE id=:id");
        $stmt->execute(array(
            ':id' => $data['id']
        ));
   } 
   catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
    $conn = null; 
}
function tempUpdategame($data){
    try{
        $conn=openDatabaseConnection();          
        $stmt = $conn->prepare("UPDATE personen SET game= :game WHERE id=:id");
        $stmt->execute(array(
            ':id' => $data['id'],
            ':game' => $data['game']
        ));
   }
   catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
    $conn = null; 
}

function ReadCurrentPlannedGame($id){
    try {
      $conn=openDatabaseConnection();
      $stmt = $conn->prepare("SELECT games.*,personen.* FROM games INNER JOIN personen ON personen.game = games.id WHERE personen.id = :id ");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $result = $stmt->fetch();
  }
  catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
  }
  $conn = null;
  return $result;
  }
function readDistinctGames($id){
    try {
        $conn=openDatabaseConnection();
        $stmt = $conn->prepare("SELECT game FROM `personen` WHERE game = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
}
function ReadCurrentPlannedEdit($id){
    try {
        $conn=openDatabaseConnection();
        $stmt = $conn->prepare("SELECT * FROM games");
        $state = $conn->prepare("SELECT * FROM personen WHERE id = :id");
        $state->bindParam(':id', $id);
        $state->execute();
        $stmt->execute();
        $resultaat = $state->fetch();
        $result = $stmt->fetchAll();
    } 
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return array($result, $resultaat);
    }

    function updateplanning($data){
        try{
            $conn=openDatabaseConnection();          
            $stmt = $conn->prepare("UPDATE personen SET date=:date,start=:start, explainer=:explainer, players=:players, game=:game WHERE id=:id");
            $stmt->execute(array(
                ':date' => $data['date'],
                ':start' => $data['start'],
                ':explainer' => $data['explainer'],
                ':players' => $data['players'],
                ':game' => $data['game'],
                ':id' => $data['id']
            ));
       }
       catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        }
        $conn = null; 
     }

function GetPlannedStart($result){
    try {
        $conn=openDatabaseConnection();
        $stmt = $conn->prepare("SELECT start FROM personen WHERE start = :result");
        $stmt->bindParam(':result', $result);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
}

function destroyPlanning($id){
  try{ 
   $conn=openDatabaseConnection();
   $stmt = $conn->prepare("DELETE FROM personen WHERE id = :id");
   $stmt->bindParam(':id', $id);
   $stmt->execute();
  }
  catch(PDOException $e){
   echo "Connection failed: " . $e->getMessage();
   }
   $conn = null;
}

//  function createPlan($name,$image,$description,$expansions,$skills,$url,$youtube,$min_players,$max_players,$play_minutes,$explain_minutes,$id){
//     // Maak hier de code om een medewerker te bewerken
//     try{
//         // Open de verbinding met de database
//         $conn=openDatabaseConnection();
//         // Zet de query klaar door middel van de prepare method
//         $stmt = $conn->prepare("UPDATE games SET name='$name', image='$image', image='$image', description='$description', expansions='$expansions', skills='$skills', url='$url', youtube='$youtube', min_players='$min_players', max_players='$max_players', play_minutes='$play_minutes', explain_minutes='$explain_minutes' WHERE id= $id");
//         $stmt->execute();
//        }
//        catch(PDOException $e){

//         echo "Connection failed: " . $e->getMessage();
//         }
//         // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
//         // van de server opgeschoond blijft
//         $conn = null; 
// }
 

// function createGame($name,$image,$description,$expansions,$skills,$url,$youtube,$min_players,$max_players,$play_minutes,$explain_minutes){
//    try{
//     $conn=openDatabaseConnection();
//     $stmt = $conn->prepare("INSERT INTO games (name,image,description,expansions,skills,url,youtube,min_players,max_players,play_minutes,explain_minutes) 
//     VALUES ('$name','$image','$description','$expansions','$skills','$url','$youtube','$min_players','$max_players','$play_minutes','$explain_minutes')");
//     $stmt->execute();
//    }
//    catch(PDOException $e){
//     echo "Connection failed: " . $e->getMessage();
//     }
//     $conn = null;
//  }
?>