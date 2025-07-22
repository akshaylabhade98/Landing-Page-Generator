<?php

include "protect.php";
include "important.php";

$secondary_color = $_POST['secondary_color'];
$title = $_POST['title'];
$logo = $_POST['logo'];
$logo_size = $_POST['logo_size'];
$primary_color = $_POST['primary_color'];
$Subtitle = $_POST['Subtitle'];
$text = $_POST['text'];
$abstract = $_POST['abstract'];
$image_link = $_POST['image_link'];
$landing_page_link = $_POST['landing_page_link'];
$primary_color = $_POST['primary_color'];
$Button_text = $_POST['Button_text'];

$strOut	=	'<!doctype html><html lang="en"> <head> <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> <link rel="preconnect" href="https://fonts.googleapis.com"> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> <style type="text/css"> .main{background-color: '.$secondary_color.';}.bg{background-color: #DCDCDC;}a.white{color:white;}a.dark{color:black;}</style> <title> '.$title.' </title> </head>';

$strOut	=	$strOut
		.	'<body class="d-flex justify-content-center bg"> <div class="col-sm-7 main my-4" style="border-radius : 10px; box-shadow: 0px 0px 16px black;"> <div class="p-3"> <img src="'.$logo.'" style="width: '.$logo_size.';"> </div><div style="background-color: '.$primary_color.'; border-radius: 10px; box-shadow: 0px 0px 15px black;" class="text-white text-center py-1"> <h2>'.$title.'<br><small>'.$Subtitle.'</small></h2> </div><div class="text-justify p-3 text-'.$text.'"> <p>'.$abstract.'</p></div><div class="text-center"> <img src="'.$image_link.'" class="w-50" style="box-shadow: 0px 0px 15px black; border-radius:10px;"> </div><div class="text-center p-3 mt-3"> <a href="'.$landing_page_link.'"><button class=" btn text-white rounded btn-lg" type="submit" style="background-color: '.$primary_color.'; border-color: '.$primary_color.'; box-shadow: 0px 0px 15px black; ">'.$Button_text.'</button></a> </div><div class="text-center p-3"> <small class="text-'.$text.'">All Rights Reserved . ©2025 '.$Company_name.'. <a class="'.$text.'" href="'.$Privacy_Policy_link.'">Privacy Policy</a> or <a class="'.$text.'" href="'.$Unsubscribe_link.'">Unsubscribe</a>.</small> </div></div><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> </body></html>';

$pagename = $_POST['title'];
$pagename = str_replace(' ', '_', $pagename);
$pagename .= date("_d_m_y");
$pagename .= "_edm.html";

$filepath = realpath(__DIR__ . '/campaigns') . '/' . $pagename;

$f = fopen($filepath, "w");
fwrite($f, $strOut); 
fclose($f);

header( 'location: '.$base_url.'/campaigns/'.$pagename.'');
?>