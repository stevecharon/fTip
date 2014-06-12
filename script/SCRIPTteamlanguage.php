<?php



function TeamLanguage($teamname) {
include ("SCRIPTconnect.php");
$uid = $_SESSION['uid'];
$langsuffix = Whichlanguage($db, $uid);
include ("../languages/" . $langsuffix . "/teamnames." . $langsuffix);

if ($teamname == "Deutschland") { $thisteam = $langteam_germany;}
if ($teamname == "FC Schalke 04") { $thisteam = $langteam_schalke;}
if ($teamname == "Borussia Dortmund 09") { $thisteam = $langteam_dortmund;}
if ($teamname == "Bayer Leverkusen") { $thisteam = $langteam_bleverkusen;}
if ($teamname == "Bayern M&uuml;nchen") { $thisteam = $langteam_bayernmunic;}
if ($teamname == "Hertha BSC") { $thisteam = $langteam_herthabsc;}
if ($teamname == "Werder Bremen") { $thisteam = $langteam_wbremen;}
if ($teamname == "1.FC Kaiserslautern") { $thisteam = $langteam_kaiserslautern;}
if ($teamname == "VfB Stuttgart") { $thisteam = $langteam_vfbstuttgart;}
if ($teamname == "1860 M&uuml;nchen") { $thisteam = $langteam_1860munic;}
if ($teamname == "VfL Wolfsburg") { $thisteam = $langteam_vflwolfsburg;}
if ($teamname == "Hamburger SV") { $thisteam = $langteam_hamburgersv;}
if ($teamname == "Borussia M.Gladbach") { $thisteam = $langteam_bgladbach;}
if ($teamname == "Energie Cottbus") { $thisteam = $langteam_ecottbus;}
if ($teamname == "Hansa Rostock") { $thisteam = $langteam_hrostock;}
if ($teamname == "1.FC N&uuml;rnberg") { $thisteam = $langteam_fcnurnberg;}
if ($teamname == "SC Freiburg") { $thisteam = $langteam_scfreiburg;}
if ($teamname == "1.FC K&ouml;ln") { $thisteam = $langteam_fccologne;}
if ($teamname == "FC St. Pauli") { $thisteam = $langteam_stpauli;}
if ($teamname == "Vfl Bochum") { $thisteam = $langteam_vflbochum;}
if ($teamname == "Hannover 96") { $thisteam = $langteam_hannover96;}
if ($teamname == "Arminia Bielefeld") { $thisteam = $langteam_abielefeld;}
if ($teamname == "Argentinien") { $thisteam = $langteam_argentinia;}
if ($teamname == "Belgien") { $thisteam = $langteam_belgien;}
if ($teamname == "Brasilien") { $thisteam = $langteam_brasil;}
if ($teamname == "China") { $thisteam = $langteam_china;}
if ($teamname == "Costa Rica") { $thisteam = $langteam_costarica;}
if ($teamname == "D&auml;nemark") { $thisteam = $langteam_denmark;}
if ($teamname == "Ecuador") { $thisteam = $langteam_ecuador;}
if ($teamname == "England") { $thisteam = $langteam_england;}
if ($teamname == "Frankreich") { $thisteam = $langteam_france;}
if ($teamname == "Griechenland") { $thisteam = $langteam_greak;}
if ($teamname == "Holland") { $thisteam = $langteam_netherlands;}
if ($teamname == "Irland") { $thisteam = $langteam_irland;}
if ($teamname == "Italien") { $thisteam = $langteam_italy;}
if ($teamname == "Japan") { $thisteam = $langteam_japan;}
if ($teamname == "Kamerun") { $thisteam = $langteam_kamerun;}
if ($teamname == "Kroatien") { $thisteam = $langteam_croatia;}
if ($teamname == "Mexiko") { $thisteam = $langteam_mexico;}
if ($teamname == "Nigeria") { $thisteam = $langteam_nigeria;}
if ($teamname == "Paraguay") { $thisteam = $langteam_paraguay;}
if ($teamname == "Polen") { $thisteam = $langteam_poland;}
if ($teamname == "Portugal") { $thisteam = $langteam_portugal;}
if ($teamname == "Rum&auml;nien") { $thisteam = $langteam_rumania;}
if ($teamname == "Russland") { $thisteam = $langteam_russia;}
if ($teamname == "Saudi-Arabien") { $thisteam = $langteam_saudiarabia;}
if ($teamname == "Schweden") { $thisteam = $langteam_schweden;}
if ($teamname == "Senegal") { $thisteam = $langteam_senegal;}
if ($teamname == "Slowenien") { $thisteam = $langteam_slowenia;}
if ($teamname == "Spanien") { $thisteam = $langteam_spain;}
if ($teamname == "S&uuml;dafrika") { $thisteam = $langteam_southafrica;}
if ($teamname == "S&uuml;dkorea") { $thisteam = $langteam_soutchcorea;}
if ($teamname == "Tschechien") { $thisteam = $langteam_tschechien;}
if ($teamname == "Tunesien") { $thisteam = $langteam_tunesien;}
if ($teamname == "T&uuml;rkei") { $thisteam = $langteam_turk;}
if ($teamname == "Uruguay") { $thisteam = $langteam_uruguay;}
if ($teamname == "USA") { $thisteam = $langteam_unitedstates;}
if ($teamname == "AS Rom") { $thisteam = $langteam_asrom;}
if ($teamname == "Boavista Porto") { $thisteam = $langteam_boavporto;}
if ($teamname == "Celtic Glasgow") { $thisteam = $langteam_cglasgow;}
if ($teamname == "Deportivo La Coruna") { $thisteam = $langteam_dplcoruna;}
if ($teamname == "Dynamo Kiew") { $thisteam = $langteam_dynamokiew;}
if ($teamname == "FC Arsenal") { $thisteam = $langteam_fcarsenal;}
if ($teamname == "FC Barcelona") { $thisteam = $langteam_fcbarcelona;}
if ($teamname == "FC Liverpool") { $thisteam = $langteam_fcliverpool;}
if ($teamname == "FC Nantes") { $thisteam = $langteam_fcnantes;}
if ($teamname == "FC Porto") { $thisteam = $langteam_fcporto;}
if ($teamname == "Fenerbahce Istanbul") { $thisteam = $langteam_fenerbistanbul;}
if ($teamname == "Feyenoord") { $thisteam = $langteam_feyenoord;}
if ($teamname == "Galatasaray Istanbul") { $thisteam = $langteam_galatistanbul;}
if ($teamname == "Juventus Turin") { $thisteam = $langteam_juveturin;}
if ($teamname == "Lazio Rom") { $thisteam = $langteam_laziorom;}
if ($teamname == "Lokomotive Moskau") { $thisteam = $langteam_lokmoskau;}
if ($teamname == "Manchester United") { $thisteam = $langteam_manchesteru;}
if ($teamname == "Olympiakos Pir&auml;u") { $thisteam = $langteam_olymppirau;}
if ($teamname == "Olympique Lyon") { $thisteam = $langteam_olymplyon;}
if ($teamname == "OSC Lille") { $thisteam = $langteam_osclille;}
if ($teamname == "Panathinaikos Athen") { $thisteam = $langteam_panathen;}
if ($teamname == "PSV Eindhoven") { $thisteam = $langteam_psveindhoven;}
if ($teamname == "RCD Mallorca") { $thisteam = $langteam_rcdmallorca;}
if ($teamname == "Real Madrid") { $thisteam = $langteam_realmadrid;}
if ($teamname == "Rosenborg Trondheim") { $thisteam = $langteam_rtrondheim;}
if ($teamname == "RSC Anderlecht") { $thisteam = $langteam_rscanderlecht;}
if ($teamname == "Sparta Prag") { $thisteam = $langteam_spartaprag;}
if ($teamname == "Spartak Moskau") { $thisteam = $langteam_spartakmoskau;}
if ($teamname == "Eintracht Frankfurt") { $thisteam = $langteam_eintfrankfurt;}
if ($teamname == "Alemania Aachen") { $thisteam = $langteam_aaachen;}
if ($teamname == "RW Oberhausen") { $thisteam = $langteam_rwoberhausen;}
if ($teamname == "FSV Mainz 05") { $thisteam = $langteam_fsvmainz;}
if ($teamname == "Greuther F&uuml;rth") { $thisteam = $langteam_greutherfuerth;}
if ($teamname == "MSV Duisburg") { $thisteam = $langteam_msvduisburg;}
if ($teamname == "SVW Burghausen") { $thisteam = $langteam_svwburghausen;}
if ($teamname == "Eintracht Trier") { $thisteam = $langteam_etrier;}
if ($teamname == "VfB L&uuml;beck") { $thisteam = $langteam_vfblubeck;}
if ($teamname == "1.FC Union Berlin") { $thisteam = $langteam_unionberlin;}
if ($teamname == "SSV Reutlingen") { $thisteam = $langteam_ssvreutlingen;}
if ($teamname == "LR Ahlen") { $thisteam = $langteam_lrahlen;}
if ($teamname == "Karlsruher SC") { $thisteam = $langteam_karlsruhersc;}
if ($teamname == "Eintr. Braunschweig") { $thisteam = $langteam_ebraunschweig;}
if ($teamname == "SVW Mannheim") { $thisteam = $langteam_svwmannheim;}
if ($teamname == "Bulgarien") { $thisteam = $langteam_bulgaria;}
if ($teamname == "Lettland") { $thisteam = $langteam_lettland;}
if ($teamname == "Schweiz") { $thisteam = $langteam_swiss;}
if ($teamname == "SpVgg Unterhaching") { $thisteam = $langteam_spvgghaching;}
if ($teamname == "Dynamo Dresden") { $thisteam = $langteam_dyndresden;}
if ($teamname == "1. FC Saarbr&uuml;cken") { $thisteam = $langteam_fcsaarbrucken;}
if ($teamname == "RW Erfurt") { $thisteam = $langteam_rwerfurt;}
if ($teamname == "RW Essen") { $thisteam = $langteam_rwessen;}
if ($teamname == "Erzgebirge Aue") { $thisteam = $langteam_erzaue;}
if ($teamname == "VFL Osnabr&uuml;ck") { $thisteam = $langteam_vflosnabruck;}
if ($teamname == "Preu&szlig;en M&uuml;nste") { $thisteam = $langteam_preusmunster;}
if ($teamname == "Stuttgarter Kickers") { $thisteam = $langteam_stuttkickers;}
if ($teamname == "Trinidad-Tobago") { $thisteam = $langteam_trinitobago;}
if ($teamname == "Elfenbeinkueste") { $thisteam = $langteam_elfenbeink;}
if ($teamname == "Serbien-Montenegro") { $thisteam = $langteam_serbienmonte;}
if ($teamname == "Iran") { $thisteam = $langteam_iran;}
if ($teamname == "Angola") { $thisteam = $langteam_angola;}
if ($teamname == "Ghana") { $thisteam = $langteam_ghana;}
if ($teamname == "Australien") { $thisteam = $langteam_australien;}
if ($teamname == "Togo") { $thisteam = $langteam_togo;}
if ($teamname == "Ukraine") { $thisteam = $langteam_ukraine;}

return $thisteam;
}
?>