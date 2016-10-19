<?php
	$artikels = array(
	array(
		"titel" => "Netflix groeit veel harder dan verwacht",
		"datum" => "18/10/2016",
		"inhoud" => "Netflix heeft in het derde kwartaal 3,6 miljoen nieuwe abonnees verwelkomd. De Amerikaanse aanbieder van internettelevisie overtrof daarmee de verwachtingen van analisten over de groei ruimschoots.
Vooral zelfgeproduceerde series zoals \"Narcos\" en \"Stranger things\" liggen aan de basis van het groeiende aantal abonnees. Ook opvallend is dat Netflix vooral buiten de Verenigde Staten veel sneller groeit dan verwacht. Er werden 2 miljoen nieuwe abonnees verwacht buiten de VS, maar dat zijn er 3,2 miljoen geworden.

Eerder dit jaar bleef de klantengroei nog achter bij verwachtingen. Volgens Netflix kwam dat door een prijsverhoging.

Ook winst pakt hoger uit

Ook de winst pakte afgelopen kwartaal met 0,12 dollar per aandeel flink hoger uit dan de 0,06 dollar waar marktkenners door de bank genomen rekening mee hielden. De nettowinst steeg van 43,1 miljoen naar 51,5 miljoen dollar. De omzet steeg van 1,8 miljard naar 2,3 miljard dollar.

Het bedrijf gaf de afgelopen periode veel meer uit aan onder meer eigen producties en licenties en denkt dat dat aandeel alleen maar verder zal oplopen.

Voor het vierde kwartaal verwacht Netflix wereldwijd 3,75 miljoen nieuwe gebruikers.",
		"afbeelding" => "images/artikel1.jpg",
		"afbeeldingBeschrijving" => "Netflix in een internetbrowser"
		),
	array(
		"titel" => "Werkstraf voor 18-jarige na bommelding, geen grote schadevergoeding voor school",
		"datum" => "10/10/2016",
		"inhoud" => "De correctionele rechtbank van Mechelen heeft een 18-jarige jongeman veroordeeld tot een werkstraf van 80 uur voor een valse bommelding in een Mechelse school. De school wilde een schadevergoeding van 17.500 euro voor imagoschade, maar daar ging de rechtbank niet op in.
Op 25 november 2015 liep bij de lokale politie Mechelen-Willebroek een melding binnen: \"terreuraanslag op komst, haal snel alle kinderen van school\". Omdat de boodschap niet heel duidelijk was, besloot de meldkamer terug te bellen naar het bewuste telefoonnummer, maar er werd geen gevolg meer aan gegeven. Daarop werd het nummer getraceerd en kwam men uit bij een prepaidkaart die behoorde aan een 18-jarige jongeman uit Antwerpen die school liep in de Technische Scholen Mechelen (TSM).

Daags voordien, op 24 november, waren vier campussen van die school ontruimd na een andere bommelding. De jongeman kon worden opgepakt en ging al snel tot bekentenissen over. Hij gaf toe dat hij dom geweest was en geen echte reden had om die bommelding te doen. De procureur was enorm streng voor deze onbezonnen daad. \"Amper 14 dagen na de aanslagen in Parijs en in de angstcultuur die er toen heerste, was dit echt een zeer verwerpelijke daad\", klonk het. De rechtbank volgde die stelling. \"Deze daad droeg bij aan de ongerustheid en angst die in tijden van terreurdreiging heersen en waarvoor een verhoogde inzet van veiligheidsmiddelen nodig is.

Zijn advocate meent dat de jongen uit zijn fout geleerd heeft. \"De teleurstelling van zijn ouders en het veranderen van school waren zeer ingrijpend voor hem, hij beseft dat hij verkeerd was.\" De jongeman moet geen zware schadevergoeding aan de school betalen. Scholengroep TSM eiste 17.500 euro door de imagoschade die de school door deze en de vorige bommelding leed, maar kreeg slechts 250 euro toegewezen. Naast TSM stelde ook de lokale politie zich burgerlijke partij. Zij eiste 1.852 euro voor het extra werk, maar kreeg slechts 1 euro provisioneel toegewezen.",
		"afbeelding" => "images/artikel2.jpg",
		"afbeeldingBeschrijving" => "Archieffoto van een politiecombi bij de Mechelse school"
		),
	array(
		"titel" => "Pokémonoverlast in Lillo lijkt achter de rug",
		"datum" => "05/10/2016",
		"inhoud" => "In Lillo lijkt de overrompeling door spelers van Pokémon Go eindelijk achter de rug. Zondag is een nachtelijk speelverbod van kracht gegaan en volgens het kabinet van Antwerps burgemeester Bart De Wever (N-VA) zijn sindsdien geen inbreuken vastgesteld. Bovendien lijken sinds kort minder zeldzame Pokémon te vinden in het havendorp.
De amper 35 inwoners van Lillo klaagden de voorbije maanden over de massa's Pokémonjagers die er de rust kwamen verstoren. De straten en parkings stroomden dagelijks vol en de spelers bleven vaak tot 's nachts rondhangen, niet zelden vergezeld van alcohol. Burgemeester De Wever reageerde door de politie extra te laten patrouilleren om overlast te beteugelen en door extra ophaalrondes van afval te organiseren, maar een structurele oplossing bleek dat niet.

Ook het bedrijf achter Pokémon Go, Niantic, werd aangeschreven. Zij beloofden rekening te houden met de problemen en minder Pokémon te voorzien in Lillo. Omdat daar in de praktijk niets van terecht bleek te komen, besliste de Antwerpse gemeenteraad vorige week om een nachtelijk speelverbod (22 uur tot 7 uur) voor Pokémon Go in te voeren in Lillo. Dat tijdelijke politiereglement blijft sowieso nog van kracht tot 31 december, laat De Wever weten.

\"De Pokémonjagers respecteren het verbod\", aldus nog De Wever. \"Het wijkteam van Lokale Politie Antwerpen kon tijdens nachtelijke controles nog geen enkele inbreuk vaststellen. Er worden overdag nog wel enkele spelers gespot in het dorp, maar om 22 uur blijkt iedereen vertrokken.\"",
		"afbeelding" => "images/artikel3.jpg",
		"afbeeldingBeschrijving" => "Jongeren die Pokémon Go spelen"
		),
	);

$gevondenTeller = 0;
$nietGevondenTeller = 0;
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo isset($_GET["id"]) && ctype_digit($_GET["id"]) && $_GET["id"] < count($artikels) ? $artikels[$_GET["id"]]["titel"] : "De krant van vandaag" ?></title>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<header>
			<a href="oplossing-get.php"><h1>Nieuws enzo</h1></a>
			<form action="" method="get">
				<input type="search" name="searchQuery" required>
				<input type="submit" value="Zoeken">
			</form>
		</header>
		<section>
			<?php if(isset($_GET["searchQuery"]) && !empty($_GET["searchQuery"])): ?>
				<?php $_GET["searchQuery"] = trim(preg_replace("/[^ \w]+/", "", $_GET["searchQuery"])) ?>
				<?php foreach($artikels as $id => $artikel): ?>
					<?php
					if(preg_match("/" . $_GET["searchQuery"] . "/i", $artikel["titel"])
					|| preg_match("/" . $_GET["searchQuery"] . "/i", $artikel["datum"])
					|| preg_match("/" . $_GET["searchQuery"] . "/i", $artikel["inhoud"])
					|| preg_match("/" . $_GET["searchQuery"] . "/i", $artikel["afbeeldingBeschrijving"])): ?>
						<article>
							<h2><?= $artikel["titel"] ?></h2>
							<h3><?= $artikel["datum"] ?></h3>
							<img src="<?= $artikel["afbeelding"] ?>" alt="<?= $artikel["afbeeldingBeschrijving"] ?>"
							title="<?= $artikel["afbeeldingBeschrijving"] ?>">
							<p><?= substr($artikel["inhoud"], 0, 50) . "..." ?></p>
							<div>
								<a href="oplossing-get.php?id=<?= $id ?>">Lees meer</a>
							</div>
						</article>
					<?php else: ?>
						<?php ++$nietGevondenTeller ?> 
					<?php endif ?>
					<?php if($nietGevondenTeller >= count($artikels)): ?>
						<?= "De zoekterm '" . $_GET["searchQuery"] . "' komt niet voor in onze krant" ?>
					<?php endif ?>
				<?php endforeach ?>
			<?php else: ?>
				<?php if(isset($_GET["id"])): ?>
					<?php if($_GET["id"] < count($artikels) && ctype_digit($_GET["id"])): ?>
						<article class="big">
							<h2><?= $artikels[$_GET["id"]]["titel"] ?></h2>
							<h3><?= $artikels[$_GET["id"]]["datum"] ?></h3>
							<img src="<?= $artikels[$_GET["id"]]["afbeelding"] ?>" alt="<?= $artikels[$_GET["id"]]["afbeeldingBeschrijving"] ?>"
							title="<?= $artikels[$_GET["id"]]["afbeeldingBeschrijving"] ?>">
							<p><?= $artikels[$_GET["id"]]["inhoud"] ?></p>
						</article>
					<?php else: ?>
						<?= "Dit artikel bestaat niet" ?>
					<?php endif ?>
				<?php else: ?>
					<?php foreach($artikels as $id => $artikel): ?>
						<article>
							<h2><?= $artikel["titel"] ?></h2>
							<h3><?= $artikel["datum"] ?></h3>
							<img src="<?= $artikel["afbeelding"] ?>" alt="<?= $artikel["afbeeldingBeschrijving"] ?>"
							title="<?= $artikel["afbeeldingBeschrijving"] ?>">
							<p><?= substr($artikel["inhoud"], 0, 50) . "..." ?></p>
							<div>
								<a href="oplossing-get.php?id=<?= $id ?>">Lees meer</a>
							</div>
						</article>
					<?php endforeach ?>
				<?php endif ?>
			<?php endif ?>
		</section>
	</body>
</html>