<?php
require(ROOT . "model/PlanningModel.php");


function index()
{
    $games = getAllGames();
    render('planning/index', $games);
}

function info($id){
    $result = getGame($id); 
    render("planning/info", $result);
}

function planning(){
    $result = ReadPlannedGame();   
    render("planning/planning", $result);
}


function plangame(){ 
        $result = getAllGames();
        render('planning/plangame',$result);
}

function storeplan(){
    $games = GetPlannedStart($_POST['start']);
    $distinct = readDistinctGames($_POST['game']);
    $gamescount = CountAllPlannedGames();
    if(empty($_POST['explainer']) or empty($_POST['date']) or empty($_POST['start']) or empty($_POST['players'])){
        render("alerts/emptyalert");
        header( "refresh:2;url=../plangame" );
    }
    else{
        if( $gamescount["amount"] > 9 && $distinct == null){
            render("alerts/gameserror");
            header( "refresh:2;url=../planning" );
        }else{
            if($games != null){
            
                render("alerts/tijderror");
                header( "refresh:2;url=../planning" );
            }
            else{
                createPlan($_POST);
                render("alerts/plancreatesucces");
                header( "refresh:2;url=../planning" );
            }
        }
    }
}

function planninginfo($result){
    $game =  ReadCurrentPlannedGame($result);
    render('planning/planninginfo', $game);
}

function editplanning($result){
    $games =  ReadCurrentPlannedEdit($result);
     render("planning/editplanning",$games);
 }

 function editAction(){
     
    if(empty($_POST['explainer']) or empty($_POST['date']) or empty($_POST['start']) or empty($_POST['players'])){
        render("alerts/emptyalert");
        header( "refresh:2;url=../planning" );
    }
    else{
        $gameinfo = GetPlannedGame($_POST['id']);
    tempDelgame($_POST);
    $distinctgames = readDistinct($_POST);
    $games = GetPlannedStart($_POST['start']);
    $gamescountsec = CountAllPlannedGames();
    tempUpdategame($gameinfo);
        if( $gamescountsec["amount"] > 9 && $distinctgames == NULL){
            tempUpdategame($gameinfo);
            render("alerts/gameserror");
            header( "refresh:2;url=../planning" );
        }
        else{
            if($games != null){
                if($gameinfo['start'] != $_POST['start']){
                    tempUpdategame($gameinfo);
                    render("alerts/tijderror");
                    header( "refresh:2;url=../planning" );
                }
                else{
                    updateplanning($_POST);
                    render("alerts/plancreatesucces");
                    header( "refresh:2;url=../planning" );
                }
            }
            else{
                updateplanning($_POST);
                render("alerts/plancreatesucces");
                header( "refresh:2;url=../planning" );
            }
        }
    }
}

 function deleteplanning($result){
    $result = GetPlannedGame($result);
     render("planning/deleteplanning", $result);
 }
 
 function destroy($result){
     destroyPlanning($result);
     header('Location: ../planning');
 }

// function create(){
//     //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
//     render('planning/create');
    
// }

// function store($result){
//     //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
//     $result = createGame($result["name"], $result["image"], $result["description"], $result["expansions"], $result["skills"], $result["url"], $result["youtube"], $result["min_players"], $result["max_players"], $result["play_minutes"], $result["explain_minutes"]);
//     //2. Bouw een url op en redirect hierheen

//     header('Location: ../index');
    
// }

// function update($id){
//     //1. Haal 1 medewerker op uit de database (via de model) en sla deze op in een variable
//     $result = getGame($id); 
//     //2. Geef een view weer en geef de variable met medewerkers hieraan mee
//     render("planning/update", $result);
// }

// function updateAction($result, $id){
//     $result = updateGame($result["name"], $result["image"], $result["description"], $result["expansions"], $result["skills"], $result["url"], $result["youtube"], $result["min_players"], $result["max_players"], $result["play_minutes"], $result["explain_minutes"],$id);
//     header('Location: ../index');
// }



?>