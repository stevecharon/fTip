######################################################
# fTip - der ultimative Fussball - Tip - Manager     #
# Database: ftip                                     #
#                                                    #
# (c) GPL 2004                                       #
# written by produnis, mostlyHarmless, david, borny  #
# since 2002                                         #
######################################################

#
# Generation Time: 2004-07-07 10:14:27 +0200
# ************************************************************

#########################################################################
#                                                                       #
# Dieses DUMPfile beinhaltet die Installations-Datenbank von fTip       #
# inklusive aller Bundesligaergebnisse von 2000 - 2004 und der EM 2004  #
#                                                                       #
#########################################################################

# Dump of table config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `version` varchar(25) default 'nicht verfuegbar',
  `www` text,
  `localfile` text,
  `maild` varchar(25) default NULL,
  `maildserver` text,
  `source` text,
  `newuser_txt` text,
  `userselfadd_flag` tinyint(1) NOT NULL default '0',
  `reminduser_flag` tinyint(4) NOT NULL default '1',
  `reminduser_txt` text,
  `jabber_id` text NOT NULL,
  `jabber_pwd` text NOT NULL,
  `jabber_room` text NOT NULL,
  `jabber` tinyint(4) NOT NULL default '0',
  `forum_flag` tinyint(1) NOT NULL default '0',
  `em_meister_punkte` tinyint(4) NOT NULL default '10',
  `wm_meister_punkte` tinyint(4) NOT NULL default '15',
  `bl_meister_punkte` tinyint(4) NOT NULL default '50',
  `logflag` tinyint(1) NOT NULL default '1'
) TYPE=MyISAM;

INSERT INTO `config` (`version`,`www`,`localfile`,`maild`,`maildserver`,`source`,`newuser_txt`,`userselfadd_flag`,`reminduser_flag`,`reminduser_txt`,`jabber_id`,`jabber_pwd`,`jabber_room`,`jabber`,`forum_flag`,`em_meister_punkte`,`wm_meister_punkte`,`bl_meister_punkte`,`logflag`) VALUES ("1.3","","","","","http://www.produnis.de/fTip/","Hallo USER\r\n\r\nschoen, dass du bei fTip mitmachen, und Bundesligaergebnisse mit uns tippen moechtest.\r\nDie Webseite, ueber die das Ganze ablaufen soll, findest Du unter dem Link:\r\n\r\nURL\r\n\r\nUm Dich einzuloggen, benutze:\r\n\r\n(ACHTUNG:  Gross- Kleinschreibung BEACHTEN!!!)\r\n\r\nUsername:	USER\r\nPasswort:	USER\r\n\r\n\r\nKlicke dann aus Sicherheitsgruenden zuerst in der Menueleiste auf \"Userdaten\", und aendere Dein Zugangs-Passwort.\r\n\r\n\r\nDie Regeln (Kurzform)\r\n1. Die Tips muessen bis 2 Stunden vor Spielbeginn abgegeben werden. (Achtung ! Sicherer ist EINEN TAG VORHER!!!!)\r\n\r\n\r\n2. Es gelten folgende Punkteverteilungen beim Vergleich Eurer Tips und den tatsaechlichen Ergebnissen:\r\n(Beispiel: Schalke spielt gegen Dortmund, in Schalke)\r\n\r\na) gleiche Anzahl Tore Heim  = 1 Punkt\r\n(ich tippe 2:0, und das tatsaechliche Ergebnis ist 2:1. Ich erhalte 1 Punkt dafuer, dass ich fuer Schalke 2 Tore getippt habe, und die auch wirklich 2 Tore geschossen haben.)\r\n\r\nb) gleiche Anzahl Tore Gast  = 1 Punkt\r\n(genauso wie a), ich tippe 2:0, und Schalke gewinnt 4:0, so erhalte ich 1 Punkt dafuer, dass ich getippt habe, dass Dortmund kein Tor schiesst, und die dann auch wirklich keins schiessen.)\r\n\r\nc) gleiche Tendenz = 1 Punkt\r\n(ich tippe 0:0, und die spielen 2:2, so erhalte ich 1 Punkt dafuer, dass ich \"unentschieden\" getippt habe)\r\n(ich tippe 1:0, und die spielen 4:1, so erhalte ich 1 Punkt dafuer, dass ich \"Schalke gewinnt\" getippt habe)\r\n\r\na)-c) gelten zusammen,\r\n\r\nDAS HEISST:\r\nPro Spiel kannst Du 3 Punkte holen (genau wie die Mannschaften). (pro Spieltag 27 Punkte).\r\n\r\nBeispiele:\r\na) Ich tippe 1:0, echtes Ergebnis 0:0\r\n- ich erhalte 1 Punkt dafuer, dass ich \"Dortmund 0 Tore\" getippt habe, und die auch wirklich keins geschossen haben\r\n----ich erhalte insgesamt 1 Punkt fuer das Spiel\r\n\r\nb) Ich tippe 2:1, echtes Ergebnis 2:0\r\n- ich erhalte 1 Punkt fuer \"Schalke schiesst 2 Tore\"\r\n- ich erhalte 1 Punkt fuer \"Schalke gewinnt\"\r\n---ich erhalte insgesamt 2 Punkte fuer das Spiel\r\n\r\nc) Ich tippe 0:0, die spielen auch 0:0\r\n- ich erhalte 1 Punkt fuer \"Schalke schiesst kein Tor\"\r\n- ich erhalte 1 Punkt fuer \"Dortmund schiesst kein Tor\"\r\n- ich erhalte 1 Punkt fuer \"sie spielen unentschieden\"\r\n---ich erhalte insgesamt 3 Punkte fuer das Spiel\r\n\r\nd) kein Tip abgegeben = 0 Punkte\r\n--------soweit alles klar ?!\r\n\r\n\r\nSehr schoen, bleibt mir nur noch zu sagen,\r\ndass dieses Programm in unserer (arg begrenzten?!) Freizeit\r\nentsteht, sich also noch in der Entwicklung befindet, und daher einige Programmpunkte noch nicht voll ausgebaut werden konnten... im Groben und Ganzen funktioniert es aber schon sehr schick und recht vollstaendig....\r\n\r\n\r\nFuer jede Art von Kritik und Feedback sind wir Euch dankbar,\r\nschreibt bitte Eure Meinungen an \r\n\r\nfeedback@produnis.de \r\n\r\n\r\n\r\n\r\nAnsonsten,\r\nviel Spass beim Tippen,\r\n\r\nfTip-Mail-Daemon\r\n\r\n\r\n-------------------------------------\r\nfTip (c) 2002-2004 sirDavid, produnis, mostlyHarmless, borny\r\n-------------------------------------","1","1","Hallo USER ....\r\n\r\ndenke daran, dass Du rechtzeitig Deine Tips für \r\nWKNAME  bei fTip abgibst !\r\n\r\nklicke auf diesen Link:   URL\r\n\r\nWenn Du keine Erinnerungen mehr erhalten m?chtest, entferne das H?kchen im Usermenü\r\n\r\nBeste Grü?e,\r\nDein fTip.Daemon","","","","1","1","10","15","30","1");


# Dump of table forum
# ------------------------------------------------------------

DROP TABLE IF EXISTS `forum`;

CREATE TABLE `forum` (
  `id` int(11) NOT NULL auto_increment,
  `forum_id` int(11) NOT NULL default '0',
  `beitrag_id` int(11) NOT NULL default '0',
  `reply_nr` int(11) NOT NULL default '0',
  `titel` text,
  `text` text,
  `user_id` int(11) NOT NULL default '0',
  `klicks` int(11) NOT NULL default '0',
  `timestamp` timestamp(14) NOT NULL,
  `time` text,
  `time2` text,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;



# Dump of table forum_smiley
# ------------------------------------------------------------

DROP TABLE IF EXISTS `forum_smiley`;

CREATE TABLE `forum_smiley` (
  `id` int(11) NOT NULL auto_increment,
  `file` tinytext NOT NULL,
  `tag` tinytext,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("1","FBIchamp.gif",":champ:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("2","FBIplatz1.gif",":erster:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("3","FBIplatz2.gif",":zweiter:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("4","FBIplatz3.gif",":dritter:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("5","FBIwunschtraum.gif",":wunsch:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("6","FBScheerleader.gif",":cheer:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("7","FBschiri_Kgelb.gif",":gelb:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("8","FBschiri_Krot.gif",":rot:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("9","FBschiri.gif",":schiriball:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("10","FBSkopfball.gif",":kopfball:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("11","FBStor.gif",":tor:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("12","FBSverlierer_gewinner.gif",":losewin:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("13","FL1bulgarien.gif",":fbulg:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("14","FL1denmark.gif",":fdaenm:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("15","FL1deutschland.gif",":fdeutsch:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("16","FL1england.gif",":fengl:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("17","FL1frankreich.gif",":ffrankr:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("18","FL1griechenland.gif",":fgriech:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("19","FL1italien.gif",":fitalia:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("20","FL1kroatien.gif",":fkroat:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("21","FL1lettland.gif",":flettl:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("22","FL1niederlande.gif",":fholl:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("23","FL1portugal.gif",":fportu:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("24","FL1russland.gif",":fruss:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("25","FL1schweden.gif",":fschweden:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("26","FL1schweiz.gif",":fschweiz:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("27","FL1spanien.gif",":fspane:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("28","FL1tschechien.gif",":ftschech:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("29","FSs1deutschland.gif",":deutsch2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("30","FSs1europa.gif",":europa:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("31","FSs1italien.gif",":italien2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("32","FSx1deutschland2.gif",":deutsch:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("33","FSx1england2.gif",":engl:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("34","FSx1frankreich.gif",":frankr:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("35","FSx1italien2.gif",":italien:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("36","FSx1schweden2.gif",":schwe:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("37","FSxD_96.gif",":96:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("38","FSxD_1860.gif",":1860:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("39","FSxD_bielefeld.gif",":bielefeld:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("40","FSxD_bochumvfl.gif",":vfl:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("41","FSxD_bxb.gif",":bvb:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("42","FSxD_fck.gif",":fck:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("43","FSxD_fcn.gif",":fcn:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("44","FSxD_gladbach.gif",":gladbach:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("45","FSxD_hansa.gif",":hansa:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("46","FSxD_hertha.gif",":hertha:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("47","FSxD_s04.gif",":s04:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("48","FSxD_vfbSt.gif",":vfb:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("49","FSxD_vizekusen.gif",":leverkusen:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("50","FSxD_werder.gif",":werder:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("51","FSxD_wob.gif",":wolfsburg:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("52","FWSSc_blauweiss.gif",":schals04:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("53","FWSSc_gruenweiss.gif",":schalwerder:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("54","FWSSc_rotweisss.gif",":schalrot:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("55","FWSSc_schwGelb.gif",":schalbvb:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("56","FWSSc_schwGruen.gif",":schalbmg:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("57","Kampf_arschWackel.gif",":popo:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("58","Kampf_boxer.gif",":boxer:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("59","Kampf_flamethrow.gif",":flamme:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("60","Kampf_haueKnueppel.gif",":haue:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("61","Kampf_klatch3.gif",":haue2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("62","Kampf_MatrixKampf.gif",":kloppe:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("63","Kampf_rambo.gif",":rambo:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("64","OTHERdoener.gif",":doener:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("65","OTHERexhibizionist.gif",":menne:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("66","OTHERhumba.gif",":humba:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("67","OTHERKoenigAnbet.gif",":koenig:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("68","OTHERlaola.gif",":laola:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("69","OTHERmultis.gif",":3000:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("70","OTHERmusiker.gif",":musik:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("71","OTHERPferdKackt.gif",":pferd:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("72","OTHERsoeren1.gif",":soeren:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("73","OTHERsoeren2.gif",":soeren2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("74","OTHERsoeren3.gif",":soeren3:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("75","OTHERsteckenpferd.gif",":steckenpferd:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("76","OTHERuglyking.gif",":uglyking:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("77","OTHERverzetteln.gif",":postings:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("78","Partybier1.gif",":bierpipi:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("79","Partybier2.gif",":weizen:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("80","Partybier3.gif",":bier:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("81","Partybirthday.gif",":birthday:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("82","Partyparty.gif",":danceparty:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("83","Partyprost1.gif",":prost:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("84","Partyprost2.gif",":prost2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("85","Partyprost3.gif",":prost3:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("86","Partysmilestrauss.gif",":userstrauss:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("87","SCHILDdafuer.gif",":dafuer:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("88","SCHILDdagegen.gif",":dagegen:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("89","SCHILDmrburns.gif",":mrburns:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("90","SCHILDoffTopic.gif",":offtopic:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("91","SCHILDrespekt.gif",":respect:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("92","SCHILDspam.gif",":spam:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("93","SCHILDspassbremse.gif",":bremse:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("94","SITabschied.gif",":abschied:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("95","SITanbet.gif",":knie:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("96","SITapplaus.gif",":applaus:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("97","SITBallaBalla.gif",":insane:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("98","SITbiggrin.gif",":D");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("99","SITconfused.gif",":raetsel:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("100","SITcool.gif","B-)");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("101","SITdAUMENhoch.gif",":up:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("102","SITdAUMENrunter.gif",":down:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("103","SITDududu.gif",":dudu:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("104","SITeek.gif",":marco:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("105","SITeffenberg.gif",":effe:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("106","SITgathering.gif",":gathering:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("107","SITgroup.gif",":gruppenkuschel:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("108","SITgruebel.gif",":gruebel:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("109","SITGruppenGrinsen.gif",":multigrins:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("110","SIThappy.gif",":-)");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("111","SITka.gif",":ka:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("112","SITkippe.gif",":kippe:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("113","SITklugscheiss.gif",":klugscheiss:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("114","SITknirsch.gif",":-(");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("115","SITkopfJA.gif",":ja:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("116","SITkopfNEIN2schuettel.gif",":nein:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("117","SITkopfwand.gif",":wand:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("118","SITkotzen.gif",":kotz:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("119","SITlach.gif",":lach:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("120","SITmad.gif",":(");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("121","SITmjam.gif",":mjam:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("122","SITpatschStirn.gif",":patsch:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("123","SITpfffft.gif",":pfft:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("124","SITrofl.gif",":rofl:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("125","SITroflGold.gif",":goldrofl:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("126","SITsauerWolke.gif",":grummel:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("127","SITschelm.gif",":schelm:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("128","SITschelm2.gif",":schelm2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("129","SITsmile.gif",":)");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("130","SITsterneSehen.gif",":sterne:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("131","SITtroest.gif",":troest:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("132","SITtroest2.gif",":troest2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("133","SITuphihi.gif",":uphihi:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("134","SITweinen1.gif",";(");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("135","SITweinen2.gif",";-(");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("136","SITwhistling.gif",":pfeiff:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("137","SITwinkewinke2.gif",":huhu:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("138","SITwinkewinke3.gif",":winke:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("139","SITwinkewinke4.gif",":winke2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("140","SITwinkewinke5.gif",":winke3:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("141","SITzwink.gif",";)");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("142","SITzwink2.gif",";-)");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("143","XMASsantaSchlitten.gif",":santa:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("144","FBNBVBklo.gif",":bxbklo:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("145","FBNscheissbvb.gif",":kotzbxb:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("146","OTHERmegafon.gif",":megafon:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("147","SIToohh.gif","8o");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("148","FBITorCount1.gif",":torcount:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("149","OTHERhallo_at_all.gif",":hiall:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("150","OTHERkochwurst1.gif",":kochwurst:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("151","OTHERstaubsofa.gif",":staubsofa:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("152","SITahaeffekt.gif",":aha:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("153","SITauslachen.gif",":auslach:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("154","SITdacapo.gif",":dacapo:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("155","SITdaumensupi1.gif",":doppeldaumen:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("156","SITgenau.gif",":daumenja:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("157","SIThelp.gif",":help:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("158","SITkicher.gif",":kicher:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("159","SITlach2.gif",":lach2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("160","SITschreck.gif",":waaa:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("161","SITvertragen.gif",":vertragen:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("162","SITzeitung.gif",":justread:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("163","THE_SIMPSONapu1.gif",":apu:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("164","THE_SIMPSONbarny1.gif",":barny:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("165","THE_SIMPSONbart0.gif",":bart:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("166","THE_SIMPSONbart1.gif",":bart1:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("167","THE_SIMPSONbart2.gif",":bart2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("168","THE_SIMPSONbart3.gif",":bart3:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("169","THE_SIMPSONbart4.gif",":bart4:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("170","THE_SIMPSONbart5.gif",":bart5:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("171","THE_SIMPSONburns1.gif",":burns:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("172","THE_SIMPSONburns2.gif",":burns2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("173","THE_SIMPSONgrampa1.gif",":grampa:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("174","THE_SIMPSONhomer_bart1.gif",":homerbart:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("175","THE_SIMPSONhomer1.gif",":homer:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("176","THE_SIMPSONhomer2.gif",":homer1:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("177","THE_SIMPSONhomer3.gif",":homer2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("178","THE_SIMPSONhomer4.gif",":homer3:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("179","THE_SIMPSONitchy_scratchy1.gif",":itchyscratchy:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("180","THE_SIMPSONlionelHuds1.gif",":lionel:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("181","THE_SIMPSONlisa1.gif",":lisa:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("182","THE_SIMPSONlisa2.gif",":lisa1:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("183","THE_SIMPSONmaggi1.gif",":maggi:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("184","THE_SIMPSONmaggi2.gif",":maggi1:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("185","THE_SIMPSONmaggi3.gif",":maggi2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("186","THE_SIMPSONmarge1.gif",":marge:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("187","THE_SIMPSONmaulwurf1.gif",":maulwurf:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("188","THE_SIMPSONmillhouse1.gif",":milhouse:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("189","THE_SIMPSONmillhouse2.gif",":milhouse1:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("190","THE_SIMPSONmoe1.gif",":moe:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("191","THE_SIMPSONNedFlanders1.gif",":ned:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("192","THE_SIMPSONnelson1.gif",":nelson:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("193","THE_SIMPSONnelson2.gif",":nelson1:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("194","THE_SIMPSONralphWiggum1.gif",":ralph:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("195","THE_SIMPSONruprecht1.gif",":ruprecht:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("196","THE_SIMPSONwiggum1.gif",":wiggum:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("197","THE_SIMPSONwilly1.gif",":willy:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("198","THE_SIMPSONwilly2.gif",":willy1:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("199","THE_SIMPSONwissenschaft1.gif",":wissenschaft:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("200","Kampf_abpraller.gif",":kugelschutz:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("201","Kampf_antaeuschen.gif",":antaeusch:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("202","Kampf_fasert.gif",":faser:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("203","Kampf_fizzstrahl.gif",":fizzbeam:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("204","Kampf_guns.gif",":guns:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("205","Kampf_haue.gif",":hauen:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("206","Kampf_megaburn.gif",":megaburn:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("207","Kampf_platz.gif",":zerplatz:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("208","Kampf_popohaue.gif",":popohaue:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("209","Kampf_startwars.gif",":starwars:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("210","OTHERhillarty.gif",":hillary:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("211","OTHERsoerensensei1.gif",":senseisoeren:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("212","OTHERbischoff.gif",":bischoff:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("213","OTHERschaaf.gif",":schaaf:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("214","OTHERschaaf2.gif",":schaaf2:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("215","OTHERschaf.gif",":schaaf3:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("216","OTHERsteuerboard.gif",":steuerboard:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("217","OTHERurlaubLiegstuhl.gif",":urlaub:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("218","PartyDJ.gif",":dj:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("219","SITduschen1.gif",":duschen:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("220","SITkussohrfeige.gif",":kussfeige:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("221","SITlachenPlatz.gif",":lachplatz:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("222","SITpoppen.gif",":drews:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("223","SITzeitunglesen.gif",":zeitung:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("224","THE_SIMPSONbart_Tafel.gif",":barttafel:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("225","XMASschneesantaflocke.gif",":santaflocke:");
INSERT INTO `forum_smiley` (`id`,`file`,`tag`) VALUES ("226","SITwinkewinke1.gif",":winke4:");


# Dump of table liga_art
# ------------------------------------------------------------

DROP TABLE IF EXISTS `liga_art`;

CREATE TABLE `liga_art` (
  `id` int(3) unsigned NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `teams` tinyint(3) unsigned default NULL,
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM;

INSERT INTO `liga_art` (`id`,`name`,`teams`) VALUES ("1","Weltmeisterschaft","1");
INSERT INTO `liga_art` (`id`,`name`,`teams`) VALUES ("2","EM","2");
INSERT INTO `liga_art` (`id`,`name`,`teams`) VALUES ("3","Bundesliga","3");
INSERT INTO `liga_art` (`id`,`name`,`teams`) VALUES ("4","UEFA-Cup","4");
INSERT INTO `liga_art` (`id`,`name`,`teams`) VALUES ("5","Champions League","4");
INSERT INTO `liga_art` (`id`,`name`,`teams`) VALUES ("6","DFB-Pokal","3");


# Dump of table liga_spiel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `liga_spiel`;

CREATE TABLE `liga_spiel` (
  `id` int(11) NOT NULL auto_increment,
  `wettkampf_id` int(11) NOT NULL default '0',
  `spieltag` tinyint(4) NOT NULL default '0',
  `gruppe` char(1) default NULL,
  `datum` datetime NOT NULL default '0000-00-00 00:00:00',
  `heim_team_id` tinyint(4) NOT NULL default '0',
  `gast_team_id` tinyint(4) NOT NULL default '0',
  `tore_heim` tinyint(4) default NULL,
  `tore_gast` tinyint(4) default NULL,
  `done` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM;

# Dump of table liga_spiel
# ------------------------------------------------------------

INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","21","87","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-06 00:00:00","87","21","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","20","21","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-17 00:00:00","21","20","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","87","20","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-13 00:00:00","20","87","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","18","20","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-08 00:00:00","20","18","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-11 00:00:00","21","18","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-01 00:00:00","18","21","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-03 00:00:00","18","87","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-25 00:00:00","87","18","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","20","17","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-06 00:00:00","17","20","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-01 00:00:00","17","21","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-29 00:00:00","21","17","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","87","17","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-23 00:00:00","17","87","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-27 00:00:00","17","18","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-18 00:00:00","18","17","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","18","15","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-13 00:00:00","15","18","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-28 00:00:00","20","15","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-13 00:00:00","15","20","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-21 00:00:00","15","21","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-27 00:00:00","21","15","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-14 00:00:00","87","15","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-16 00:00:00","15","87","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-07 00:00:00","15","17","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-09 00:00:00","17","15","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-10 00:00:00","15","13","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-01 00:00:00","13","15","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-14 00:00:00","20","13","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-27 00:00:00","13","20","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-06 00:00:00","13","21","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-20 00:00:00","21","13","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-28 00:00:00","87","13","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-14 00:00:00","13","87","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-21 00:00:00","13","17","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-23 00:00:00","17","13","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-01-31 00:00:00","18","13","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-03 00:00:00","13","18","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","12","87","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-16 00:00:00","87","12","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","17","12","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-13 00:00:00","12","17","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","12","18","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-22 00:00:00","18","12","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-20 00:00:00","13","12","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-04 00:00:00","12","13","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-06 00:00:00","15","12","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-21 00:00:00","12","15","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-07 00:00:00","12","20","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-09 00:00:00","20","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-02-01 00:00:00","21","12","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-02 00:00:00","12","21","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","21","11","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-14 00:00:00","11","21","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-01 00:00:00","11","87","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-29 00:00:00","87","11","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","13","11","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-22 00:00:00","11","13","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","11","17","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-08 00:00:00","17","11","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-27 00:00:00","15","11","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-18 00:00:00","11","15","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-07 00:00:00","11","18","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-20 00:00:00","18","11","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-14 00:00:00","12","11","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-17 00:00:00","11","12","1","5","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-01-31 00:00:00","20","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-02 00:00:00","11","20","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","13","10","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-17 00:00:00","10","13","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","15","10","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-06 00:00:00","10","15","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","10","12","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-08 00:00:00","12","10","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-10 00:00:00","20","10","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-01 00:00:00","10","20","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-03 00:00:00","10","21","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-25 00:00:00","21","10","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-27 00:00:00","87","10","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-18 00:00:00","10","87","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-21 00:00:00","10","17","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-04 00:00:00","17","10","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-28 00:00:00","18","10","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-13 00:00:00","10","18","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-21 00:00:00","11","10","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-23 00:00:00","10","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","12","9","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-06 00:00:00","9","12","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-02 00:00:00","9","20","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-29 00:00:00","20","9","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","21","9","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-22 00:00:00","9","21","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","9","87","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-08 00:00:00","87","9","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-11 00:00:00","17","9","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-01 00:00:00","9","17","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-03 00:00:00","11","9","1","1","5");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-25 00:00:00","9","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-20 00:00:00","18","9","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-04 00:00:00","9","18","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-14 00:00:00","9","10","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-27 00:00:00","10","9","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-14 00:00:00","9","13","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-16 00:00:00","13","9","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-01-31 00:00:00","9","15","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-03 00:00:00","15","9","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","8","11","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-06 00:00:00","11","8","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-01 00:00:00","8","13","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-29 00:00:00","13","8","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","8","15","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-08 00:00:00","15","8","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-28 00:00:00","12","8","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-19 00:00:00","8","12","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-20 00:00:00","8","20","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-04 00:00:00","20","8","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-13 00:00:00","21","8","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-27 00:00:00","8","21","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-06 00:00:00","8","87","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-21 00:00:00","87","8","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-29 00:00:00","17","8","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-14 00:00:00","8","17","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-21 00:00:00","8","9","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-23 00:00:00","9","8","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-07 00:00:00","8","18","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-09 00:00:00","18","8","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-01-31 00:00:00","10","8","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-02 00:00:00","8","10","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","15","7","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-16 00:00:00","7","15","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-01 00:00:00","7","12","1","6","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-29 00:00:00","12","7","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","20","7","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-22 00:00:00","7","20","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","7","21","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-08 00:00:00","21","7","1","1","5");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-10 00:00:00","87","7","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-01 00:00:00","7","87","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-04 00:00:00","7","17","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-25 00:00:00","17","7","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-28 00:00:00","9","7","1","4","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-18 00:00:00","7","9","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-21 00:00:00","11","7","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-05 00:00:00","7","11","1","5","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-13 00:00:00","7","18","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-27 00:00:00","18","7","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-07 00:00:00","10","7","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-20 00:00:00","7","10","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-15 00:00:00","7","8","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-16 00:00:00","8","7","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-07 00:00:00","13","7","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-09 00:00:00","7","13","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","6","18","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-16 00:00:00","18","6","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","10","6","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-13 00:00:00","6","10","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","6","8","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-23 00:00:00","8","6","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","13","6","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-08 00:00:00","6","13","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-10 00:00:00","6","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-01 00:00:00","11","6","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-03 00:00:00","6","15","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-25 00:00:00","15","6","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-13 00:00:00","12","6","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-28 00:00:00","6","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-06 00:00:00","6","20","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-20 00:00:00","20","6","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-29 00:00:00","21","6","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-13 00:00:00","6","21","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-22 00:00:00","6","87","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-23 00:00:00","87","6","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-14 00:00:00","17","6","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-16 00:00:00","6","17","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-08 00:00:00","6","9","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-10 00:00:00","9","6","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-01-31 00:00:00","7","6","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-02 00:00:00","6","7","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","5","17","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-16 00:00:00","17","5","1","0","6");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","9","5","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-13 00:00:00","5","9","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","5","7","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-06 00:00:00","7","5","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-01 00:00:00","18","5","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-29 00:00:00","5","18","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","5","10","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-22 00:00:00","10","5","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-03 00:00:00","8","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-25 00:00:00","5","8","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-27 00:00:00","5","13","1","5","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-18 00:00:00","13","5","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-20 00:00:00","6","5","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-04 00:00:00","5","6","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-13 00:00:00","5","15","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-27 00:00:00","15","5","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-28 00:00:00","5","11","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-13 00:00:00","11","5","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-21 00:00:00","5","12","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-24 00:00:00","12","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-14 00:00:00","20","5","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-16 00:00:00","5","20","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-08 00:00:00","5","21","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-09 00:00:00","21","5","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-01-31 00:00:00","87","5","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-01 00:00:00","5","87","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","4","9","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-17 00:00:00","9","4","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","7","4","1","2","6");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-13 00:00:00","4","7","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","4","18","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-07 00:00:00","18","4","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-01 00:00:00","10","4","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-29 00:00:00","4","10","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-10 00:00:00","4","8","1","6","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-02 00:00:00","8","4","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-03 00:00:00","13","4","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-26 00:00:00","4","13","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-27 00:00:00","4","6","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-18 00:00:00","6","4","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-20 00:00:00","15","4","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-05 00:00:00","4","15","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-13 00:00:00","4","11","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-27 00:00:00","11","4","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-06 00:00:00","4","5","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-20 00:00:00","5","4","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-28 00:00:00","12","4","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-13 00:00:00","4","12","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-21 00:00:00","4","20","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-23 00:00:00","20","4","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-14 00:00:00","21","4","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-16 00:00:00","4","21","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-07 00:00:00","4","87","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-10 00:00:00","87","4","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-02-01 00:00:00","17","4","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-02 00:00:00","4","17","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","8","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-17 00:00:00","3","8","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","3","13","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-14 00:00:00","13","3","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","6","3","1","6","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-06 00:00:00","3","6","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-01 00:00:00","3","15","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-30 00:00:00","15","3","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","4","3","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-22 00:00:00","3","4","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","3","5","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-09 00:00:00","5","3","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-10 00:00:00","12","3","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-02 00:00:00","3","12","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-04 00:00:00","3","20","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-26 00:00:00","20","3","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-27 00:00:00","21","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-18 00:00:00","3","21","1","6","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-20 00:00:00","3","87","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-04 00:00:00","87","3","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-13 00:00:00","17","3","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-27 00:00:00","3","17","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-06 00:00:00","3","9","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-20 00:00:00","9","3","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-28 00:00:00","7","3","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-13 00:00:00","3","7","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-22 00:00:00","3","18","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-23 00:00:00","18","3","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-15 00:00:00","10","3","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-16 00:00:00","3","10","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-07 00:00:00","11","3","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-09 00:00:00","3","11","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","34","","2004-05-22 00:00:00","11","2","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","17","","2003-12-17 00:00:00","2","11","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","33","","2004-05-15 00:00:00","2","8","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","16","","2003-12-13 00:00:00","8","2","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","32","","2004-05-09 00:00:00","13","2","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","15","","2003-12-07 00:00:00","2","13","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","31","","2004-05-02 00:00:00","2","6","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","14","","2003-11-30 00:00:00","6","2","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","30","","2004-04-24 00:00:00","15","2","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","13","","2003-11-22 00:00:00","2","15","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","29","","2004-04-17 00:00:00","2","4","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","12","","2003-11-09 00:00:00","4","2","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","28","","2004-04-10 00:00:00","5","2","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","11","","2003-11-01 00:00:00","2","5","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","27","","2004-04-03 00:00:00","2","12","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","10","","2003-10-25 00:00:00","12","2","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","26","","2004-03-27 00:00:00","20","2","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","9","","2003-10-19 00:00:00","2","20","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","25","","2004-03-20 00:00:00","2","21","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","8","","2003-10-04 00:00:00","21","2","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","24","","2004-03-13 00:00:00","87","2","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","7","","2003-09-28 00:00:00","2","87","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","23","","2004-03-06 00:00:00","2","17","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","6","","2003-09-20 00:00:00","17","2","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","22","","2004-02-28 00:00:00","9","2","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","5","","2003-09-13 00:00:00","2","9","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","21","","2004-02-21 00:00:00","2","7","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","4","","2003-08-23 00:00:00","7","2","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","20","","2004-02-14 00:00:00","18","2","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","3","","2003-08-17 00:00:00","2","18","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","19","","2004-02-07 00:00:00","2","10","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","2","","2003-08-09 00:00:00","10","2","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","18","","2004-01-30 00:00:00","3","2","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("1","1","","2003-08-02 00:00:00","2","3","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","1","A","2004-06-12 18:00:00","43","32","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","2","A","2004-06-16 18:00:00","32","50","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","3","A","2004-06-20 20:45:00","45","32","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","2","A","2004-06-16 20:45:00","45","43","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","3","A","2004-06-20 20:45:00","50","43","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","1","A","2004-06-12 20:45:00","50","45","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","1","B","2004-06-13 20:45:00","31","30","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","2","B","2004-06-17 18:00:00","30","106","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","3","B","2004-06-21 20:45:00","38","30","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","2","B","2004-06-17 20:45:00","38","31","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","3","B","2004-06-21 20:45:00","106","31","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","1","B","2004-06-13 18:00:00","106","38","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","1","C","2004-06-14 20:45:00","47","104","1","5","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","2","C","2004-06-18 18:00:00","104","28","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","3","C","2004-06-22 20:45:00","35","104","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","1","C","2004-06-14 18:00:00","28","35","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","3","C","2004-06-22 20:45:00","28","47","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","2","C","2004-06-18 20:45:00","35","47","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","1","D","2004-06-15 20:45:00","1","33","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","2","D","2004-06-19 18:00:00","105","1","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","3","D","2004-06-23 20:45:00","1","53","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","2","D","2004-06-19 20:45:00","33","53","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","3","D","2004-06-23 20:45:00","33","105","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","1","D","2004-06-15 18:00:00","53","105","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","4","1","2004-06-24 20:45:00","43","30","1","8","7");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","4","2","2004-06-25 20:45:00","31","32","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","4","3","2004-06-26 20:45:00","47","33","1","4","5");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","4","4","2004-06-27 20:45:00","53","28","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","5","1","2004-06-30 20:45:00","43","33","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","5","2","2004-07-01 20:45:00","32","53","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("2","6","1","2004-07-04 20:45:00","43","32","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-12 00:00:00","8","20","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-16 00:00:00","20","8","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-19 00:00:00","11","8","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-27 00:00:00","8","11","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-05 00:00:00","8","9","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-03 00:00:00","9","8","1","6","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-08 00:00:00","107","8","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-10 00:00:00","8","107","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-15 00:00:00","8","18","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-18 00:00:00","18","8","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-24 00:00:00","15","8","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-02-25 00:00:00","8","15","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-09-30 00:00:00","8","14","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-03 00:00:00","14","8","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-14 00:00:00","10","8","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-11 00:00:00","8","10","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-20 00:00:00","8","7","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-18 00:00:00","7","8","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-28 00:00:00","3","8","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-04-01 00:00:00","8","3","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-04 00:00:00","8","2","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-08 00:00:00","2","8","1","5","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-12 00:00:00","87","8","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-14 00:00:00","8","87","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-18 00:00:00","8","17","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-22 00:00:00","17","8","1","5","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-26 00:00:00","4","8","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-28 00:00:00","8","4","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-03 00:00:00","8","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-05 00:00:00","12","8","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-09 00:00:00","8","5","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","5","8","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-13 00:00:00","6","8","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","8","6","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-13 00:00:00","2","18","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-16 00:00:00","18","2","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-20 00:00:00","18","87","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-27 00:00:00","87","18","1","1","5");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-05 00:00:00","17","18","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-03 00:00:00","18","17","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-09 00:00:00","18","4","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-10 00:00:00","4","18","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-23 00:00:00","18","5","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-02-24 00:00:00","5","18","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-09-30 00:00:00","6","18","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-03 00:00:00","18","6","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-14 00:00:00","18","20","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-10 00:00:00","20","18","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-21 00:00:00","11","18","1","6","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-16 00:00:00","18","11","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-29 00:00:00","18","9","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-03-31 00:00:00","9","18","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-05 00:00:00","107","18","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-07 00:00:00","18","107","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-11 00:00:00","18","12","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-15 00:00:00","12","18","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-18 00:00:00","18","15","1","5","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-21 00:00:00","15","18","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-25 00:00:00","14","18","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-28 00:00:00","18","14","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-02 00:00:00","18","10","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-05 00:00:00","10","18","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-10 00:00:00","7","18","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","18","7","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-13 00:00:00","18","3","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","3","18","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-12 00:00:00","12","10","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-16 00:00:00","10","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-19 00:00:00","10","7","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-27 00:00:00","7","10","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-06 00:00:00","3","10","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-02 00:00:00","10","3","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-09 00:00:00","10","2","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-10 00:00:00","2","10","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-16 00:00:00","87","10","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-16 00:00:00","10","87","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-22 00:00:00","10","17","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-02-24 00:00:00","17","10","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-09-30 00:00:00","4","10","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-04 00:00:00","10","4","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-21 00:00:00","5","10","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-17 00:00:00","10","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-29 00:00:00","10","6","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-03-31 00:00:00","6","10","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-04 00:00:00","20","10","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-07 00:00:00","10","20","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-11 00:00:00","10","11","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-14 00:00:00","11","10","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-17 00:00:00","9","10","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-22 00:00:00","10","9","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-26 00:00:00","10","107","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-29 00:00:00","107","10","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-09 00:00:00","10","15","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","15","10","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-13 00:00:00","14","10","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","10","14","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-12 00:00:00","4","11","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-16 00:00:00","11","4","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-19 00:00:00","9","4","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-28 00:00:00","4","9","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-05 00:00:00","4","107","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-04 00:00:00","107","4","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-16 00:00:00","4","15","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-17 00:00:00","15","4","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-23 00:00:00","14","4","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-02-23 00:00:00","4","14","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-14 00:00:00","7","4","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-09 00:00:00","4","7","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-21 00:00:00","4","3","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-17 00:00:00","3","4","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-28 00:00:00","2","4","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-03-31 00:00:00","4","2","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-03 00:00:00","4","87","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-07 00:00:00","87","4","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-11 00:00:00","17","4","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-14 00:00:00","4","17","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-18 00:00:00","12","4","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-21 00:00:00","4","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-02 00:00:00","5","4","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-05 00:00:00","4","5","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-10 00:00:00","4","6","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","6","4","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-13 00:00:00","20","4","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","4","20","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-12 00:00:00","5","6","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-17 00:00:00","6","5","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-19 00:00:00","20","5","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-27 00:00:00","5","20","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-06 00:00:00","5","11","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-03 00:00:00","11","5","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-09 00:00:00","9","5","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-10 00:00:00","5","9","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-16 00:00:00","5","107","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-17 00:00:00","107","5","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-09-30 00:00:00","5","15","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-03 00:00:00","15","5","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-14 00:00:00","14","5","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-10 00:00:00","5","14","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-28 00:00:00","7","5","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-03-31 00:00:00","5","7","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-04 00:00:00","5","3","1","6","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-07 00:00:00","3","5","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-11 00:00:00","2","5","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-14 00:00:00","5","2","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-18 00:00:00","5","87","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-21 00:00:00","87","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-25 00:00:00","17","5","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-28 00:00:00","5","17","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-13 00:00:00","5","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","12","5","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-11 00:00:00","3","15","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-16 00:00:00","15","3","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-18 00:00:00","14","3","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-27 00:00:00","3","14","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-09 00:00:00","7","3","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-11 00:00:00","3","7","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-16 00:00:00","12","3","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-17 00:00:00","3","12","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-23 00:00:00","3","2","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-02-24 00:00:00","2","3","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-09-29 00:00:00","87","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-02 00:00:00","3","87","1","6","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-13 00:00:00","3","17","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-10 00:00:00","17","3","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-10 00:00:00","3","6","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-14 00:00:00","6","3","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-19 00:00:00","20","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-20 00:00:00","3","20","1","5","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-25 00:00:00","3","11","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-27 00:00:00","11","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-02 00:00:00","9","3","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-04 00:00:00","3","9","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-09 00:00:00","3","107","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","107","3","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-13 00:00:00","87","107","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-15 00:00:00","107","87","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-06 00:00:00","87","15","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-04 00:00:00","15","87","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-10 00:00:00","14","87","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-09 00:00:00","87","14","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-23 00:00:00","7","87","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-02-24 00:00:00","87","7","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-14 00:00:00","2","87","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-10 00:00:00","87","2","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-21 00:00:00","12","87","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-17 00:00:00","87","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-28 00:00:00","87","17","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-03-31 00:00:00","17","87","1","5","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-25 00:00:00","87","6","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-28 00:00:00","6","87","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-02 00:00:00","20","87","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-05 00:00:00","87","20","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-08 00:00:00","87","11","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","11","87","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-12 00:00:00","9","87","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","87","9","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-12 00:00:00","7","14","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-17 00:00:00","14","7","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-05 00:00:00","2","14","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-03 00:00:00","14","2","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-16 00:00:00","17","14","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-17 00:00:00","14","17","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-21 00:00:00","6","14","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-17 00:00:00","14","6","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-27 00:00:00","14","20","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-04-01 00:00:00","20","14","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-05 00:00:00","11","14","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-06 00:00:00","14","11","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-12 00:00:00","14","9","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-12 00:00:00","9","14","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-19 00:00:00","107","14","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-21 00:00:00","14","107","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-03 00:00:00","14","15","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-05 00:00:00","15","14","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-10 00:00:00","12","14","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","14","12","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-20 00:00:00","15","2","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-26 00:00:00","2","15","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-17 00:00:00","2","7","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-17 00:00:00","7","2","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-09-30 00:00:00","12","2","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-04 00:00:00","2","12","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-22 00:00:00","17","2","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-17 00:00:00","2","17","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-18 00:00:00","6","2","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-21 00:00:00","2","6","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-24 00:00:00","2","20","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-28 00:00:00","20","2","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-02 00:00:00","11","2","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-05 00:00:00","2","11","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-09 00:00:00","2","9","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","9","2","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-12 00:00:00","107","2","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","2","107","1","5","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-19 00:00:00","6","12","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-28 00:00:00","12","6","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-06 00:00:00","12","7","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-03 00:00:00","7","12","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-09 00:00:00","20","12","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-10 00:00:00","12","20","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-23 00:00:00","11","12","1","4","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-02-24 00:00:00","12","11","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-14 00:00:00","9","12","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-11 00:00:00","12","9","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-28 00:00:00","107","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-03-31 00:00:00","12","107","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-04 00:00:00","12","17","1","5","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-07 00:00:00","17","12","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-25 00:00:00","15","12","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-29 00:00:00","12","15","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-10 00:00:00","15","17","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-11 00:00:00","17","15","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-15 00:00:00","15","6","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-10 00:00:00","6","15","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-22 00:00:00","20","15","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-17 00:00:00","15","20","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","10","","2000-10-28 00:00:00","15","11","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","27","","2001-03-30 00:00:00","11","15","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-04 00:00:00","9","15","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-08 00:00:00","15","9","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-11 00:00:00","15","107","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-15 00:00:00","107","15","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-13 00:00:00","15","7","1","5","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","7","15","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","3","","2000-09-06 00:00:00","6","20","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","20","","2001-02-03 00:00:00","20","6","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","4","","2000-09-09 00:00:00","11","6","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","21","","2001-02-10 00:00:00","6","11","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-17 00:00:00","6","9","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-18 00:00:00","9","6","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-24 00:00:00","107","6","1","5","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-03-07 00:00:00","6","107","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","11","","2000-11-04 00:00:00","6","7","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","28","","2001-04-07 00:00:00","7","6","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-02 00:00:00","6","17","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-06 00:00:00","17","6","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","1","","2000-08-12 00:00:00","17","9","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","18","","2001-12-16 00:00:00","9","17","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","2","","2000-08-19 00:00:00","107","17","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","19","","2001-01-27 00:00:00","17","107","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-10-01 00:00:00","17","7","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-03 00:00:00","7","17","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","16","","2000-12-09 00:00:00","17","20","1","5","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","33","","2001-05-12 00:00:00","20","17","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","17","","2000-12-12 00:00:00","11","17","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","34","","2001-05-19 00:00:00","17","11","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-09-30 00:00:00","20","107","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-03 00:00:00","107","20","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","8","","2000-10-15 00:00:00","107","11","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","25","","2001-03-10 00:00:00","11","107","1","6","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","9","","2000-10-21 00:00:00","9","107","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","26","","2001-03-18 00:00:00","107","9","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","15","","2000-12-20 00:00:00","107","7","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","32","","2001-05-06 00:00:00","7","107","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","6","","2000-09-23 00:00:00","9","20","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","23","","2001-02-25 00:00:00","20","9","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","7","","2000-10-01 00:00:00","11","9","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","24","","2001-03-03 00:00:00","9","11","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","14","","2000-11-26 00:00:00","7","9","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","31","","2001-04-28 00:00:00","9","7","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","5","","2000-09-16 00:00:00","20","11","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","22","","2001-02-17 00:00:00","11","20","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","12","","2000-11-11 00:00:00","7","20","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","29","","2001-04-14 00:00:00","20","7","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","13","","2000-11-18 00:00:00","11","7","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("3","30","","2001-04-21 00:00:00","7","11","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-07-28 00:00:00","10","8","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-19 00:00:00","8","10","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-05 00:00:00","8","13","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-26 00:00:00","13","8","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-11 00:00:00","8","18","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-02 00:00:00","18","8","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-18 00:00:00","12","8","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-06 00:00:00","8","12","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-09 00:00:00","8","7","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-09 00:00:00","7","8","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-15 00:00:00","16","8","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-16 00:00:00","8","16","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-22 00:00:00","8","6","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-23 00:00:00","6","8","1","5","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-29 00:00:00","11","8","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-03 00:00:00","8","11","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-13 00:00:00","8","15","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-09 00:00:00","15","8","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-20 00:00:00","5","8","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-16 00:00:00","8","5","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-27 00:00:00","8","2","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-23 00:00:00","2","8","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-03 00:00:00","4","8","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-30 00:00:00","8","4","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-17 00:00:00","8","19","1","5","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-06 00:00:00","19","8","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-25 00:00:00","3","8","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-14 00:00:00","8","3","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-01 00:00:00","8","17","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-21 00:00:00","17","8","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-08 00:00:00","14","8","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","8","14","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-16 00:00:00","8","9","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","9","8","1","4","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-07-28 00:00:00","9","18","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-19 00:00:00","18","9","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-04 00:00:00","18","10","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-26 00:00:00","10","18","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-19 00:00:00","18","13","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-05 00:00:00","13","18","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-09 00:00:00","18","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-10 00:00:00","12","18","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-15 00:00:00","7","18","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-17 00:00:00","18","7","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-22 00:00:00","18","16","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-23 00:00:00","16","18","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-29 00:00:00","6","18","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-02 00:00:00","18","6","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-14 00:00:00","18","11","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-09 00:00:00","11","18","1","5","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-20 00:00:00","15","18","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-16 00:00:00","18","15","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-27 00:00:00","18","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-23 00:00:00","5","18","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-03 00:00:00","2","18","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-31 00:00:00","18","2","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-17 00:00:00","18","4","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-06 00:00:00","4","18","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-24 00:00:00","19","18","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-13 00:00:00","18","19","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-01 00:00:00","18","3","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-20 00:00:00","3","18","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-09 00:00:00","17","18","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","18","17","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-15 00:00:00","18","14","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","14","18","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-07-28 00:00:00","3","16","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-18 00:00:00","16","3","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-05 00:00:00","16","17","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-26 00:00:00","17","16","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-11 00:00:00","14","16","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-02 00:00:00","16","14","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-18 00:00:00","16","9","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-05 00:00:00","9","16","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-08 00:00:00","10","16","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-10 00:00:00","16","10","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-29 00:00:00","16","12","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-02 00:00:00","12","16","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-14 00:00:00","7","16","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-09 00:00:00","16","7","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-20 00:00:00","16","13","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-16 00:00:00","13","16","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-28 00:00:00","16","6","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-23 00:00:00","6","16","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-03 00:00:00","11","16","1","5","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-30 00:00:00","16","11","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-18 00:00:00","16","15","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-06 00:00:00","15","16","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-24 00:00:00","5","16","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-13 00:00:00","16","5","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-01 00:00:00","16","2","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-20 00:00:00","2","16","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-08 00:00:00","4","16","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","16","4","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-15 00:00:00","16","19","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","19","16","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-11 00:00:00","10","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-02 00:00:00","12","10","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-18 00:00:00","7","10","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-05 00:00:00","10","7","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-16 00:00:00","6","10","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-16 00:00:00","10","6","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-23 00:00:00","10","11","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-23 00:00:00","11","10","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-29 00:00:00","15","10","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-02 00:00:00","10","15","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-13 00:00:00","10","5","1","1","5");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-09 00:00:00","5","10","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-20 00:00:00","2","10","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-17 00:00:00","10","2","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-27 00:00:00","10","4","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-23 00:00:00","4","10","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-03 00:00:00","19","10","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-30 00:00:00","10","19","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-17 00:00:00","10","3","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-07 00:00:00","3","10","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-25 00:00:00","17","10","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-13 00:00:00","10","17","1","5","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-01 00:00:00","10","14","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-20 00:00:00","14","10","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-08 00:00:00","9","10","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","10","9","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-15 00:00:00","10","13","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","13","10","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-07-28 00:00:00","4","11","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-19 00:00:00","11","4","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-04 00:00:00","15","4","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-26 00:00:00","4","15","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-11 00:00:00","4","5","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-03 00:00:00","5","4","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-18 00:00:00","2","4","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-06 00:00:00","4","2","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-08 00:00:00","13","4","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-09 00:00:00","4","13","1","5","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-15 00:00:00","4","19","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-16 00:00:00","19","4","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-22 00:00:00","3","4","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-24 00:00:00","4","3","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-30 00:00:00","4","17","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-02 00:00:00","17","4","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-13 00:00:00","14","4","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-09 00:00:00","4","14","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-20 00:00:00","4","9","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-16 00:00:00","9","4","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-24 00:00:00","4","12","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-13 00:00:00","12","4","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-01 00:00:00","7","4","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-20 00:00:00","4","7","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-15 00:00:00","6","4","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","4","6","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-07-28 00:00:00","13","5","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-18 00:00:00","5","13","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-04 00:00:00","5","2","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-26 00:00:00","2","5","1","5","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-18 00:00:00","5","19","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-06 00:00:00","19","5","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-08 00:00:00","3","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-09 00:00:00","5","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-15 00:00:00","5","17","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-16 00:00:00","17","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-22 00:00:00","14","5","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-23 00:00:00","5","14","1","6","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-30 00:00:00","5","9","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-02 00:00:00","9","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-03 00:00:00","5","12","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-30 00:00:00","12","5","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-17 00:00:00","7","5","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-06 00:00:00","5","7","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-02 00:00:00","6","5","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-20 00:00:00","5","6","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-08 00:00:00","5","11","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","11","5","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-15 00:00:00","15","5","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","5","15","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-04 00:00:00","6","3","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-27 00:00:00","3","6","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-11 00:00:00","3","11","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-02 00:00:00","11","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-18 00:00:00","15","3","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-06 00:00:00","3","15","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-15 00:00:00","2","3","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-16 00:00:00","3","2","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-29 00:00:00","19","3","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-03 00:00:00","3","19","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-13 00:00:00","13","3","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-09 00:00:00","3","13","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-21 00:00:00","3","17","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-17 00:00:00","17","3","1","1","5");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-27 00:00:00","14","3","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-24 00:00:00","3","14","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-03 00:00:00","3","9","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-30 00:00:00","9","3","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-08 00:00:00","3","12","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","12","3","1","3","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-15 00:00:00","7","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","3","7","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-12 00:00:00","13","2","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-02 00:00:00","2","13","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-15 00:00:00","12","13","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-16 00:00:00","13","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-23 00:00:00","13","19","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-23 00:00:00","19","13","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-29 00:00:00","7","13","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-02 00:00:00","13","7","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-27 00:00:00","13","17","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-23 00:00:00","17","13","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-04 00:00:00","6","13","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-30 00:00:00","13","6","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-18 00:00:00","13","14","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-06 00:00:00","14","13","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-24 00:00:00","11","13","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-13 00:00:00","13","11","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-01 00:00:00","9","13","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-21 00:00:00","13","9","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-08 00:00:00","13","15","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","15","13","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-07-28 00:00:00","14","12","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-18 00:00:00","12","14","1","5","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-04 00:00:00","7","14","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-27 00:00:00","14","7","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-19 00:00:00","6","14","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-05 00:00:00","14","6","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-08 00:00:00","14","11","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-09 00:00:00","11","14","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-16 00:00:00","15","14","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-17 00:00:00","14","15","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","8","","2001-09-29 00:00:00","2","14","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","25","","2002-03-02 00:00:00","14","2","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-20 00:00:00","19","14","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-16 00:00:00","14","19","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-04 00:00:00","17","14","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-30 00:00:00","14","17","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-24 00:00:00","14","9","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-14 00:00:00","9","14","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-08-21 00:00:00","2","15","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-19 00:00:00","15","2","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-08 00:00:00","19","2","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-09 00:00:00","2","19","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-22 00:00:00","17","2","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-23 00:00:00","2","17","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-13 00:00:00","9","2","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-10 00:00:00","2","9","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-17 00:00:00","12","2","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-06 00:00:00","2","12","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-24 00:00:00","2","7","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-13 00:00:00","7","2","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-09 00:00:00","2","6","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","6","2","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-16 00:00:00","11","2","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","2","11","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-07-29 00:00:00","19","6","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-18 00:00:00","6","19","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-04 00:00:00","11","19","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-26 00:00:00","19","11","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-12 00:00:00","19","15","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-03 00:00:00","15","19","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-13 00:00:00","17","19","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-09 00:00:00","19","17","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-27 00:00:00","9","19","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-23 00:00:00","19","9","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-02 00:00:00","12","19","1","4","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-19 00:00:00","19","12","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","16","","2001-12-08 00:00:00","19","7","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","33","","2002-04-27 00:00:00","7","19","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","2","","2001-08-04 00:00:00","12","9","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","19","","2002-01-26 00:00:00","9","12","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-22 00:00:00","12","7","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-24 00:00:00","7","12","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","9","","2001-10-13 00:00:00","12","6","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","26","","2002-03-10 00:00:00","6","12","1","6","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-21 00:00:00","11","12","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-16 00:00:00","12","11","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-28 00:00:00","12","15","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-23 00:00:00","15","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","17","","2001-12-15 00:00:00","12","17","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","34","","2002-05-04 00:00:00","17","12","1","4","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-08 00:00:00","17","15","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-09 00:00:00","15","17","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","7","","2001-09-22 00:00:00","9","15","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","24","","2002-02-23 00:00:00","15","9","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","12","","2001-11-03 00:00:00","15","7","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","29","","2002-03-31 00:00:00","7","15","1","4","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","14","","2001-11-24 00:00:00","15","6","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","31","","2002-04-13 00:00:00","6","15","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","15","","2001-12-01 00:00:00","15","11","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","32","","2002-04-20 00:00:00","11","15","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-11 00:00:00","17","6","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-02 00:00:00","6","17","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","5","","2001-09-08 00:00:00","9","6","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","22","","2002-02-09 00:00:00","6","9","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","10","","2001-10-20 00:00:00","6","7","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","27","","2002-03-16 00:00:00","7","6","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-17 00:00:00","6","11","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-06 00:00:00","11","6","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","1","","2001-07-28 00:00:00","17","7","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","18","","2002-12-18 00:00:00","7","17","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","4","","2001-08-18 00:00:00","11","17","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","21","","2002-02-05 00:00:00","17","11","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","13","","2001-11-17 00:00:00","9","17","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","30","","2002-04-07 00:00:00","17","9","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","3","","2001-08-11 00:00:00","9","7","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","20","","2002-02-02 00:00:00","7","9","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","6","","2001-09-15 00:00:00","11","9","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","23","","2002-02-16 00:00:00","9","11","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","11","","2001-10-27 00:00:00","7","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("4","28","","2002-03-24 00:00:00","11","7","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-10 00:00:00","9","8","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-25 00:00:00","8","9","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-17 00:00:00","8","2","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-01 00:00:00","2","8","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-24 00:00:00","13","8","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-08 00:00:00","8","13","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-11 00:00:00","8","22","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-15 00:00:00","22","8","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-15 00:00:00","12","8","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-22 00:00:00","8","12","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-21 00:00:00","8","10","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-01 00:00:00","10","8","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-29 00:00:00","16","8","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-09 00:00:00","8","16","1","5","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-05 00:00:00","8","14","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-15 00:00:00","14","8","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-19 00:00:00","4","8","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-22 00:00:00","8","4","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-11-13 00:00:00","8","20","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-05 00:00:00","20","8","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-02 00:00:00","15","8","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-12 00:00:00","8","15","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-09 00:00:00","8","21","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-19 00:00:00","21","8","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-17 00:00:00","7","8","1","5","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-27 00:00:00","8","7","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-23 00:00:00","8","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-03 00:00:00","5","8","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-11-30 00:00:00","8","11","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-10 00:00:00","11","8","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-07 00:00:00","3","8","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","8","3","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-15 00:00:00","8","6","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","6","8","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-10 00:00:00","16","20","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-25 00:00:00","20","16","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-17 00:00:00","15","16","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-01 00:00:00","16","15","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-25 00:00:00","16","21","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-08 00:00:00","21","16","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-10 00:00:00","7","16","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-15 00:00:00","16","7","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-14 00:00:00","16","5","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-22 00:00:00","5","16","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-21 00:00:00","11","16","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-01 00:00:00","16","11","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-05 00:00:00","6","16","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-16 00:00:00","16","6","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-20 00:00:00","16","9","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-23 00:00:00","9","16","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-10-26 00:00:00","2","16","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-05 00:00:00","16","2","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-02 00:00:00","16","13","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-12 00:00:00","13","16","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-09 00:00:00","22","16","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-19 00:00:00","16","22","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-16 00:00:00","16","12","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-26 00:00:00","12","16","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-24 00:00:00","10","16","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-03 00:00:00","16","10","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-11-30 00:00:00","16","3","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-10 00:00:00","3","16","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-07 00:00:00","16","14","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","14","16","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-14 00:00:00","4","16","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","16","4","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-14 00:00:00","10","15","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-25 00:00:00","15","10","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-17 00:00:00","21","10","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-01 00:00:00","10","21","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-24 00:00:00","10","7","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-08 00:00:00","7","10","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-10 00:00:00","5","10","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-15 00:00:00","10","5","1","0","5");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-14 00:00:00","10","11","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-22 00:00:00","11","10","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-28 00:00:00","10","6","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-08 00:00:00","6","10","1","6","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-06 00:00:00","9","10","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-16 00:00:00","10","9","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-19 00:00:00","10","2","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-22 00:00:00","2","10","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-10-26 00:00:00","13","10","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-06 00:00:00","10","13","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-02 00:00:00","10","22","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-12 00:00:00","22","10","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-09 00:00:00","12","10","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-19 00:00:00","10","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-16 00:00:00","3","10","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-26 00:00:00","10","3","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-11-30 00:00:00","14","10","1","3","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-10 00:00:00","10","14","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-07 00:00:00","10","4","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","4","10","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-14 00:00:00","20","10","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","10","20","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-11 00:00:00","22","7","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-25 00:00:00","7","22","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-17 00:00:00","5","22","1","6","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-01 00:00:00","22","5","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-24 00:00:00","22","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-08 00:00:00","11","22","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-14 00:00:00","22","6","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-23 00:00:00","6","22","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-22 00:00:00","9","22","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-02 00:00:00","22","9","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-28 00:00:00","22","2","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-08 00:00:00","2","22","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-05 00:00:00","13","22","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-15 00:00:00","22","13","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-19 00:00:00","3","22","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-22 00:00:00","22","3","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-10-26 00:00:00","22","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-05 00:00:00","12","22","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-16 00:00:00","14","22","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-27 00:00:00","22","14","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-23 00:00:00","22","4","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-04 00:00:00","4","22","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-11-30 00:00:00","20","22","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-11 00:00:00","22","20","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-07 00:00:00","22","15","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","15","22","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-14 00:00:00","21","22","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","22","21","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-10 00:00:00","14","4","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-26 00:00:00","4","14","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-17 00:00:00","4","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-02 00:00:00","3","4","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-24 00:00:00","4","20","1","2","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-08 00:00:00","20","4","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-11 00:00:00","15","4","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-15 00:00:00","4","15","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-14 00:00:00","4","21","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-22 00:00:00","21","4","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-21 00:00:00","7","4","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-01 00:00:00","4","7","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-28 00:00:00","4","5","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-08 00:00:00","5","4","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-05 00:00:00","11","4","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-15 00:00:00","4","11","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-10-26 00:00:00","6","4","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-05 00:00:00","4","6","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-02 00:00:00","4","9","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-12 00:00:00","9","4","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-09 00:00:00","2","4","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-20 00:00:00","4","2","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-16 00:00:00","4","13","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-26 00:00:00","13","4","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-11-30 00:00:00","4","12","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-10 00:00:00","12","4","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-10 00:00:00","13","5","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-26 00:00:00","5","13","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-24 00:00:00","12","5","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-09 00:00:00","5","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-21 00:00:00","5","14","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-01 00:00:00","14","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-05 00:00:00","5","20","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-15 00:00:00","20","5","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-19 00:00:00","15","5","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-22 00:00:00","5","15","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-10-26 00:00:00","5","21","1","3","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-05 00:00:00","21","5","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-03 00:00:00","7","5","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-12 00:00:00","5","7","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-09 00:00:00","5","3","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-19 00:00:00","3","5","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-16 00:00:00","5","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-26 00:00:00","11","5","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-11-30 00:00:00","5","6","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-10 00:00:00","6","5","1","3","6");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-07 00:00:00","9","5","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","5","9","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-14 00:00:00","5","2","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","2","5","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-09 00:00:00","3","6","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-25 00:00:00","6","3","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-24 00:00:00","3","9","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-09 00:00:00","9","3","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-10 00:00:00","20","3","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-15 00:00:00","3","20","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-14 00:00:00","3","2","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-22 00:00:00","2","3","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-21 00:00:00","15","3","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-01 00:00:00","3","15","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-28 00:00:00","3","13","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-08 00:00:00","13","3","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-05 00:00:00","21","3","1","0","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-15 00:00:00","3","21","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-10-26 00:00:00","7","3","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-05 00:00:00","3","7","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-02 00:00:00","3","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-12 00:00:00","12","3","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-23 00:00:00","11","3","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-03 00:00:00","3","11","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-14 00:00:00","14","3","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","3","14","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-18 00:00:00","11","13","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-19 00:00:00","13","11","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-10 00:00:00","6","13","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-16 00:00:00","13","6","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-14 00:00:00","13","9","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-23 00:00:00","9","13","1","4","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-22 00:00:00","2","13","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-01 00:00:00","13","2","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-19 00:00:00","12","13","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-22 00:00:00","13","12","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-10 00:00:00","13","14","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-19 00:00:00","14","13","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-23 00:00:00","13","20","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-03 00:00:00","20","13","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-11-30 00:00:00","15","13","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-10 00:00:00","13","15","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-08 00:00:00","13","21","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","21","13","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-14 00:00:00","7","13","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","13","7","1","4","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-17 00:00:00","20","14","1","5","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-01 00:00:00","14","20","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-24 00:00:00","14","15","1","0","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-08 00:00:00","15","14","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-11 00:00:00","21","14","1","1","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-16 00:00:00","14","21","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-14 00:00:00","14","7","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-22 00:00:00","7","14","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-28 00:00:00","14","11","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-08 00:00:00","11","14","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-19 00:00:00","14","6","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-23 00:00:00","6","14","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-10-26 00:00:00","9","14","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-05 00:00:00","14","9","1","2","3");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-02 00:00:00","14","2","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-13 00:00:00","2","14","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-24 00:00:00","12","14","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-03 00:00:00","14","12","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-10 00:00:00","2","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-25 00:00:00","11","2","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","3","","2002-08-25 00:00:00","2","6","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","20","","2003-02-08 00:00:00","6","2","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-11 00:00:00","9","2","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-15 00:00:00","2","9","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-05 00:00:00","2","12","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-15 00:00:00","12","2","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-17 00:00:00","20","2","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-26 00:00:00","2","20","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-23 00:00:00","2","15","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-04 00:00:00","15","2","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-12-01 00:00:00","21","2","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-11 00:00:00","2","21","1","0","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-07 00:00:00","2","7","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","7","2","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","1","","2002-08-11 00:00:00","12","21","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","18","","2003-01-25 00:00:00","21","12","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-18 00:00:00","7","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-02 00:00:00","12","7","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","4","","2002-09-11 00:00:00","11","12","1","2","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","21","","2003-02-15 00:00:00","12","11","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-21 00:00:00","6","12","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-02 00:00:00","12","6","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-28 00:00:00","12","9","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-08 00:00:00","9","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-08 00:00:00","12","20","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","20","12","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-14 00:00:00","15","12","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","12","15","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","6","","2002-09-21 00:00:00","21","20","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","23","","2003-03-01 00:00:00","20","21","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-28 00:00:00","15","21","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-09 00:00:00","21","15","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-19 00:00:00","21","7","1","4","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-22 00:00:00","7","21","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-02 00:00:00","21","11","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-13 00:00:00","11","21","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-16 00:00:00","21","6","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-26 00:00:00","6","21","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-23 00:00:00","9","21","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-03 00:00:00","21","9","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","5","","2002-09-15 00:00:00","20","15","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","22","","2003-02-22 00:00:00","15","20","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","8","","2002-10-06 00:00:00","7","15","1","0","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","25","","2003-03-15 00:00:00","15","7","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","10","","2002-10-27 00:00:00","11","15","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","27","","2003-04-06 00:00:00","15","11","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-10 00:00:00","6","15","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-19 00:00:00","15","6","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","13","","2002-11-16 00:00:00","15","9","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","30","","2003-04-26 00:00:00","9","15","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","2","","2002-08-17 00:00:00","6","9","1","1","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","19","","2003-02-01 00:00:00","9","6","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","11","","2002-11-03 00:00:00","20","6","1","3","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","28","","2003-04-12 00:00:00","6","20","1","1","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","14","","2002-11-23 00:00:00","6","7","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","31","","2003-05-03 00:00:00","7","6","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","16","","2002-12-07 00:00:00","6","11","1","2","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","33","","2003-05-17 00:00:00","11","6","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-09 00:00:00","9","20","1","3","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-20 00:00:00","20","9","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","15","","2002-12-01 00:00:00","7","9","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","32","","2003-05-10 00:00:00","9","7","1","0","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","17","","2002-12-15 00:00:00","11","9","1","1","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","34","","2003-05-24 00:00:00","9","11","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","7","","2002-09-29 00:00:00","20","7","1","1","4");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","24","","2003-03-08 00:00:00","7","20","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","9","","2002-10-20 00:00:00","20","11","1","4","2");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","26","","2003-03-23 00:00:00","11","20","1","2","0");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","12","","2002-11-09 00:00:00","11","7","1","3","1");
INSERT INTO `liga_spiel` (`wettkampf_id`,`spieltag`,`gruppe`,`datum`,`heim_team_id`,`gast_team_id`,`done`,`tore_heim`,`tore_gast`) VALUES ("5","29","","2003-04-19 00:00:00","7","11","1","0","1");




# Dump of table liga_tip
# ------------------------------------------------------------

DROP TABLE IF EXISTS `liga_tip`;

CREATE TABLE `liga_tip` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `liga_spiel_id` int(11) NOT NULL default '0',
  `heim_tip` tinyint(4) NOT NULL default '0',
  `gast_tip` tinyint(4) NOT NULL default '0',
  `punkte` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM;



# Dump of table meister
# ------------------------------------------------------------

DROP TABLE IF EXISTS `meister`;

CREATE TABLE `meister` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `wettkampf_id` int(11) NOT NULL default '0',
  `team_id` int(11) NOT NULL default '0',
  `changed` tinyint(4) NOT NULL default '0',
  `punkte` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM COMMENT='wer wird (welt- deutscher- usw.) Meister';



# Dump of table penalty
# ------------------------------------------------------------

DROP TABLE IF EXISTS `penalty`;

CREATE TABLE `penalty` (
  `id` int(11) NOT NULL auto_increment,
  `wettkampf_id` int(11) NOT NULL default '0',
  `team_id` int(11) NOT NULL default '0',
  `penalty` tinyint(4) NOT NULL default '0',
  `warum` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM;

# Dump of table penalty
# ------------------------------------------------------------

INSERT INTO `penalty` (`wettkampf_id`,`team_id`,`penalty`,`warum`) VALUES ("1","8","3","Verstoss gegen Lizenzierungsauflagen");


# Dump of table ranking
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ranking`;

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `wettkampf_id` int(11) NOT NULL default '0',
  `tippspiel_id` int(11) NOT NULL default '0',
  `rank` int(11) NOT NULL default '0',
  `daumen_flag` int(11) NOT NULL default '0',
  `punkte` int(11) NOT NULL default '0',
  `spieltag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;



# Dump of table register_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `register_user`;

CREATE TABLE `register_user` (
  `id` int(11) NOT NULL auto_increment,
  `name` tinytext NOT NULL,
  `mail` tinytext NOT NULL,
  `schluessel` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;



# Dump of table team
# ------------------------------------------------------------


DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL default '',
  `liga_art_teams` tinyint(4) NOT NULL default '3',
  `wappen_src` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  FULLTEXT KEY `wappen_src` (`wappen_src`)
) TYPE=MyISAM;

INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("1","Deutschland","2","deutschland.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("2","FC Schalke 04","3","fcschalke04.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("3","Borussia Dortmund 09","3","borussiadortmund-bvb.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("4","Bayer Leverkusen","3","bayer04leverkusen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("5","Bayern M&uuml;nchen","3","fcbayernmuenchen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("6","Hertha BSC","3","herthabscberlin.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("7","Werder Bremen","3","svwerderbremen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("8","1.FC Kaiserslautern","3","1fckaiserlautern.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("9","VfB Stuttgart","3","vfbstuttgart.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("10","1860 M&uuml;nchen","3","tsvmuenchen1860.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("11","VfL Wolfsburg","3","vflwolfsburg.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("12","Hamburger SV","3","hamburgersv.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("13","Borussia M.Gladbach","3","vflborussiomoenchengladbach.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("14","Energie Cottbus","3","fcenergiecottbus.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("15","Hansa Rostock","3","fchansarostock.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("16","1.FC N&uuml;rnberg","3","1fcnuernberg.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("17","SC Freiburg","3","scfreiburg.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("18","1.FC K&ouml;ln","3","1fckoeln.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("19","FC St. Pauli","3","fcstpauli.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("20","Vfl Bochum","3","vflbochum.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("21","Hannover 96","3","hannover96.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("22","Arminia Bielefeld","3","dsc-arminia-bielefeld.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("23","Argentinien","1","argentinien.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("24","Belgien","2","belgien.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("25","Brasilien","1","brasilien.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("26","China","1","china.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("27","Costa Rica","1","costarica.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("28","D&auml;nemark","2","daenemark.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("29","Ecuador","1","ecuador.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("30","England","2","england.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("31","Frankreich","2","frankreich.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("32","Griechenland","2","griechenland.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("33","Holland","2","niederlande.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("34","Irland","2","irland.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("35","Italien","2","italien.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("36","Japan","1","japan.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("37","Kamerun","1","kamerun.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("38","Kroatien","2","kroatien.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("39","Mexiko","1","mexico.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("40","Nigeria","1","nigeria.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("41","Paraguay","1","paraguay.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("42","Polen","2","polen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("43","Portugal","2","portugal.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("44","Rum&auml;nien","2","rumaenien.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("45","Russland","2","russland.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("46","Saudi-Arabien","1","saudiArabien.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("47","Schweden","2","schweden.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("48","Senegal","1","senegal.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("49","Slowenien","2","slowenien.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("50","Spanien","2","spanien.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("51","S&uuml;dafrika","1","suedAfrika.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("52","S&uuml;dkorea","1","suedkorea.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("53","Tschechien","2","tchechien.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("54","Tunesien","1","tunesien.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("55","T&uuml;rkei","2","tuerkei.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("56","Uruguay","1","uruguay.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("57","USA","1","usa.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("58","AS Rom","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("59","Boavista Porto","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("60","Celtic Glasgow","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("61","Deportivo La Coruna","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("62","Dynamo Kiew","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("63","FC Arsenal","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("64","FC Barcelona","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("65","FC Liverpool","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("66","FC Nantes","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("67","FC Porto","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("68","Fenerbahce Istanbul","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("69","Feyenoord","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("70","Galatasaray Istanbul","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("71","Juventus Turin","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("72","Lazio Rom","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("73","Lokomotive Moskau","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("74","Manchester United","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("75","Olympiakos Pir&auml;u","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("76","Olympique Lyon","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("77","OSC Lille","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("78","Panathinaikos Athen","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("79","PSV Eindhoven","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("80","RCD Mallorca","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("81","Real Madrid","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("82","Rosenborg Trondheim","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("83","RSC Anderlecht","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("84","Sparta Prag","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("85","Spartak Moskau","4","");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("87","Eintracht Frankfurt","3","eintrachtfrankfurt.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("89","Alemania Aachen","3","tsvalemanniaaachen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("90","RW Oberhausen","3","rotweissoberhausen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("91","FSV Mainz 05","3","1fsvmainz.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("92","Greuther F&uuml;rth","3","greutherfuerth.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("93","MSV Duisburg","3","msvduisburg.de.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("94","SVW Burghausen","3","burghausen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("95","Eintracht Trier","3","trier.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("96","VfB L&uuml;beck","3","vfbluebeck.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("97","1.FC Union Berlin","3","1fcunionberlin.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("98","SSV Reutlingen","3","ssvreutlingen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("99","LR Ahlen","3","lrahlen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("100","Karlsruher SC","3","karlsruhersc.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("101","Eintr. Braunschweig","3","eintbraunschweig.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("103","SVW Mannheim","3","svwaldhofmannheim.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("104","Bulgarien","2","bulgarien.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("105","Lettland","2","lettland.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("106","Schweiz","2","schweiz.png");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("107","SpVgg Unterhaching","3","unterhachingen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("108","Dynamo Dresden","3","ddresden.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("109","1. FC Saarbr&uuml;cken","3","saarbruecken.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("110","RW Erfurt","3","rwErfurt.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("111","RW Essen","3","rwessen.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("112","Erzgebirge Aue","3","erzgebaue.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("113","VFL Osnabr&uuml;ck","3","osnabrueck.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("114","Preu&szlig;en M&uuml;nste","3","preussenmuenster.gif");
INSERT INTO `team` (`id`,`name`,`liga_art_teams`,`wappen_src`) VALUES ("115","Stuttgarter Kickers","3","StuttgarterKickers.gif");



# Dump of table tippspiel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tippspiel`;

CREATE TABLE `tippspiel` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL default '',
  `pwd` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM;


# Dump of table tippspiel_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tippspiel_user`;

CREATE TABLE `tippspiel_user` (
  `id` int(11) NOT NULL auto_increment,
  `tippspiel_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `rank` int(11) default NULL,
  `daumen_flag` tinyint(4) default NULL,
  `punkte` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM;



# Dump of table tippspiel_wettkampf
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tippspiel_wettkampf`;

CREATE TABLE `tippspiel_wettkampf` (
  `id` int(11) NOT NULL auto_increment,
  `tippspiel_id` int(11) NOT NULL default '0',
  `wettkampf_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL default '',
  `pwd` text,
  `email` varchar(50) default NULL,
  `remind_flag` tinyint(11) NOT NULL default '1',
  `pic` tinyint(3) NOT NULL default '2',
  `genesis` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM COMMENT='hier werden die User angelegt';

INSERT INTO `user` (`id`,`name`,`pwd`,`email`,`remind_flag`,`pic`,`genesis`) VALUES ("1","admin","be1bb7765759657a289bb6ba1877b09f","","0","100","");


# Dump of table user_pic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_pic`;

CREATE TABLE `user_pic` (
  `id` int(11) NOT NULL auto_increment,
  `file` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

INSERT INTO `user_pic` (`id`,`file`) VALUES ("1","00admin_pic_rudi.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("2","00DEFAULT.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("3","1BVB_amoroso01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("4","1BVB_fans01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("5","1BVB_fuss.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("6","1BVB_koller01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("7","1S04Arena01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("8","1S04Arena02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("9","1S04assauer01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("10","1S04fans01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("11","1S04fans02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("12","1S04kampfbahn01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("13","1S04kuzorra01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("14","1S04kuzorra02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("15","1S04Parkstadion1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("16","1S04stevens01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("17","1S04x_AsiErich01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("18","1VFL_ruhrstadion1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("19","1VFL_ruhrstadion2.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("20","1VFL_team01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("21","1VFLfans01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("22","2STAR_beckenbauer01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("23","2STAR_calli01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("24","2STAR_hansch01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("25","2STAR_hansch02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("26","2STAR_hansch03.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("27","2STAR_netzer01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("28","3RheumaKai1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("29","3SCHIRIagro.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("30","FUN_CapFuture01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("31","FUN_CapFuture02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("32","FUN_ernieBert01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("33","FUN_Ferdinand01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("34","FUN_homer01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("35","FUN_homer02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("36","FUN_homer03.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("37","FUN_homerBart.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("38","FUN_homerFamily1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("39","FUN_kassette1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("40","FUN_Maja01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("41","FUN_Maja02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("42","FUN_ModernTalking01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("43","FUN_MrBean01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("44","FUN_Papst01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("45","TV_HDR_Helden1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("46","TV_HDR_Helden2.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("47","TV_HDR_Orcs1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("48","TV_HDR_Ringgeister1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("49","TV_HP_1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("50","TV_HP_Dumbled1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("51","TV_HP_Hagrid1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("52","TV_HP_Helden1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("53","TV_HP_Helden2.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("54","TV_HP_Snape1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("55","TV_SW_C3PO_1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("56","TV_SW_Vader1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("57","TV_SW_Yoda1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("58","TV_DP_arthur1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("59","TV_DP_slarty1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("60","2STAR_trapattoni1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("61","2STAR_trapattoni2.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("62","3voellerRijkaard.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("63","FUN_freddy1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("64","FUN_freddy2.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("65","FUN_HeinerBrehmer.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("66","FUN_HugoEgonBalder.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("67","FUN_knebel1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("68","FUN_milhouse.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("69","TV_BBB_RRichter.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("70","TV_KR_logo.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("71","TV_PG_logo.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("72","TV_PG_pater1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("73","1Frank_Bindewald01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("74","1Frank_Bindewald02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("75","1Frank_Bindewald03.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("76","1Frank_Fans01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("77","TV_DP_slarty2.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("78","TV_DP_zaphot1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("79","FUN_RickyHarris1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("80","FUN_SchachtHugo.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("81","TV_KR_KITTinterface1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("82","TV_DP_vogon1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("83","TV_DP_trilian1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("84","TV_DP_ford1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("85","TV_DP_deepThought1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("86","1VFLfneururer1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("87","1VFLfneururer2.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("88","2STAR_collina02.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("89","2STAR_collina01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("90","1zINT_TURK_fans01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("91","1VFLVideotext1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("92","1VFLVideoWuerfel1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("93","1VFLwaz1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("94","1zINT_FRzidane1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("95","1zINT_FRZidaneHenry1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("96","3tottiVSpoulsen.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("97","1S04arena_logo1.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("98","1S04100jahre.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("99","2STAR_rehakles01.jpg");
INSERT INTO `user_pic` (`id`,`file`) VALUES ("100","00admin_pic_dellingNetzer.jpg");


# Dump of table weblog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weblog`;

CREATE TABLE `weblog` (
  `id` int(11) NOT NULL auto_increment,
  `page` tinytext,
  `user` tinytext,
  `timestamp` timestamp(14) NOT NULL,
  `ip` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;



# Dump of table wettkampf
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wettkampf`;

CREATE TABLE `wettkampf` (
  `id` int(11) NOT NULL auto_increment,
  `saison` varchar(25) NOT NULL default '',
  `liga_art_id` tinyint(3) NOT NULL default '0',
  `done` tinyint(1) NOT NULL default '0',
  `spieltage` int(11) NOT NULL default '0',
  `akt_spieltag` int(11) NOT NULL default '0',
  `winner_team` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM;

# Dump of table wettkampf
# ------------------------------------------------------------

INSERT INTO `wettkampf` (`id`,`saison`,`liga_art_id`,`done`,`spieltage`,`akt_spieltag`,`winner_team`) VALUES ("1","2003/2004","3","1","34","34","7");
INSERT INTO `wettkampf` (`id`,`saison`,`liga_art_id`,`done`,`spieltage`,`akt_spieltag`,`winner_team`) VALUES ("2","Portugal 2004","2","1","6","6","32");
INSERT INTO `wettkampf` (`id`,`saison`,`liga_art_id`,`done`,`spieltage`,`akt_spieltag`,`winner_team`) VALUES ("3","2000/2001","3","1","34","34","5");
INSERT INTO `wettkampf` (`id`,`saison`,`liga_art_id`,`done`,`spieltage`,`akt_spieltag`,`winner_team`) VALUES ("4","2001/2002","3","1","34","34","3");
INSERT INTO `wettkampf` (`id`,`saison`,`liga_art_id`,`done`,`spieltage`,`akt_spieltag`,`winner_team`) VALUES ("5","2002/2003","3","1","34","34","5");



# Dump of table wettkampf_team
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wettkampf_team`;

CREATE TABLE `wettkampf_team` (
  `id` int(4) NOT NULL auto_increment,
  `wettkampf_id` int(11) NOT NULL default '0',
  `team_id` tinyint(4) NOT NULL default '0',
  `gruppe` char(1) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) TYPE=MyISAM;


# Dump of table wettkampf_team
# ----------------------------- ------------------------------------------------------------

INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","2","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","3","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","4","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","5","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","6","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","7","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","8","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","9","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","10","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","11","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","12","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","13","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","15","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","17","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","18","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","20","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","21","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("1","87","");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","104","C");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","1","D");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","28","C");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","30","B");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","31","B");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","32","A");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","33","D");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","35","C");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","38","B");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","105","D");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","43","A");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","45","A");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","47","C");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","106","B");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","50","A");
INSERT INTO `wettkampf_team` (`wettkampf_id`,`team_id`,`gruppe`) VALUES ("2","53","D");



