<?php
/**
* Class for Config Model
*
* @package Nova
*/
class Config_Model extends Model {
	
/**
* Constructor
*/	
	public function __construct()
	{
		parent::__construct();
	}

/**
* View configs
*/		
	public function viewconfig($id)
	{	$id='1';
		$sth = $this->db->prepare('SELECT * FROM nova_config WHERE id = :id');
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}

	
/**
* Save Configs
*/		
	public function saveconfig($data)
	{
		$sth = $this->db->prepare('UPDATE nova_config
			SET `title` 	= :title,
			`title_show` 	= :title_show,		
			`logo`	 	= :logo,
			`logo_show` 	= :logo_show,
			`navmenu` 	= :navmenu,
			`footer` 	= :footer,
			`footer_show` 	= :footer_show,
			`theme` 	= :theme,
			`title_show` 	= :title_show,
			`base_url` 	= :base_url,
			`email` 	= :email,
			`index_name` 	= :index_name,
			`index_show` 	= :index_show,
			`guestbook` 	= :guestbook,
			`guestbook_show`= :guestbook_show,
			`blog`	 	= :blog,
			`blog_show` 	= :blog_show,
			`articles` 	= :articles,
			`articles_show` = :articles_show,
			`contact` 	= :contact,
			`contact_show` 	= :contact_show,
			`page`	 	= :page,
			`page_show` 	= :page_show,
			`post`	 	= :post,
			`post_show` 	= :post_show,
			`trashcan` 	= :trashcan,
			`trashcan_show` = :trashcan_show,
			`gravatar_show` = :gravatar_show,
			`admin` 	= :admin,
			`profile` 	= :profile,
			`login` 	= :login,
			`logout` 	= :logout
			
			WHERE id = :id
			');
		
		$sth->execute(array(
			':id' => $data['id'],
			':title' 		=> $data['title'],
			':title_show' 		=> $data['title_show'],
			':logo' 		=> $data['logo'],
			':logo_show' 		=> $data['logo_show'],
			':navmenu' 		=> $data['navmenu'],
			':footer' 		=> $data['footer'],
			':footer_show' 		=> $data['footer_show'],
			':theme' 		=> $data['theme'],
			':title_show' 		=> $data['title_show'],
			':base_url' 		=> $data['base_url'],
			':email' 		=> $data['email'],
			':index_name' 		=> $data['index_name'],
			':index_show' 		=> $data['index_show'],
			':guestbook' 		=> $data['guestbook'],
			':guestbook_show' 	=> $data['guestbook_show'],
			':blog' 		=> $data['blog'],
			':blog_show' 		=> $data['blog_show'],
			':articles' 		=> $data['articles'],
			':articles_show' 	=> $data['articles_show'],
			':contact' 		=> $data['contact'],
			':contact_show' 	=> $data['contact_show'],
			':page' 		=> $data['page'],
			':page_show' 		=> $data['page_show'],
			':post' 		=> $data['post'],
			':post_show' 		=> $data['post_show'],
			':trashcan' 		=> $data['trashcan'],
			':trashcan_show' 	=> $data['trashcan_show'],
			':gravatar_show' 	=> $data['gravatar_show'],
			':admin' 		=> $data['admin'],
			':profile' 		=> $data['profile'],
			':login' 		=> $data['login'],
			':logout' 		=> $data['logout']			
			
		));

	}


/**
* View admin
*/		
	public function viewadmin($id)
	{	$id='1';
		$sth = $this->db->prepare('SELECT id, nickname, password, role FROM nova_users WHERE id = :id');
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}
	
/**
* Save Admin
*/		
	public function saveadmin($data)
	{
		$sth = $this->db->prepare('UPDATE nova_users
			SET `nickname` = :nickname, `password` = :password, `role` = :role
			WHERE id = :id
			');
		
		$sth->execute(array(
			':id' => $data['id'],
			':nickname' => $data['nickname'],
			':password' => $data['password'],
			':role' => $data['role']
		));

	}
	
	
/**
* Init Table nova_users
*/		
	public function inittableusers()
	{
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
$sql="DROP TABLE nova_users";

// Execute query
mysqli_query($con,$sql);  

// Create table
$sql="CREATE TABLE nova_users
(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
nickname VARCHAR(255),
name VARCHAR(255),
email VARCHAR(255) UNIQUE,
role ENUM('user','admin'),
password VARCHAR(255),
hash VARCHAR(255),
active ENUM('no','yes') DEFAULT 'no'
)";

// Execute query
mysqli_query($con,$sql);

$sql="INSERT INTO nova_users
(id, nickname, name, email, role, password, hash, active)
VALUES
(1,'admin', 'Administratör', 'admin@nova.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '' , 'yes'),
(2,'user', 'användare', 'user@nova.com', 'user', '5f4dcc3b5aa765d61d8327deb882cf99', '' , 'yes')";

// Execute query
mysqli_query($con,$sql);
}




/**
* Init Table nova_guestbook
*/		
	public function inittableguestbook()
	{
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="DROP TABLE nova_guestbook";

// Execute query
mysqli_query($con,$sql); 

// Create table
$sql="CREATE TABLE nova_guestbook
(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
topic VARCHAR(255),
text VARCHAR(255),
author VARCHAR(255),
userid INT(11),
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
edited DATETIME DEFAULT '0000-00-00 00:00:00',
deleted DATETIME DEFAULT '0000-00-00 00:00:00',
useremail VARCHAR(255),
showemail ENUM('no','yes'),
readers ENUM('all','users','admin')
)";

// Execute query
mysqli_query($con,$sql);


$sql="INSERT INTO nova_guestbook (id, topic, text, author, userid, created, edited, deleted, useremail, showemail, readers) 
VALUES
(1, 'Hälsningar från Hönö', 'Hej! Jag är en glad tjej som vill hälsa till alla från min lilla ö Hönö!', 'Anonym', 0, '2013-04-27 20:24:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'no', 'all'),
(2, 'Inventering', 'Vi behöver nya stolar till fikarummet!', 'johan', 2, '2013-04-27 20:23:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'johan@email.com', 'yes', 'admin'),
(3, 'Medlemsmöte', 'Den 3 juni kl 18.00 är det dags för medlemsmöte. Vi bjuder på fika!', 'johan', 2, '2013-04-27 20:22:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'johan@email.com', 'yes', 'users'),
(4, 'Nu är våren snart här...', 'Hej alla glada, ville bara skicka en vårhälsning till alla där ute!', 'johan', 2, '2013-04-27 20:21:06', '2013-04-28 11:19:26', '0000-00-00 00:00:00', 'johan@email.com', 'yes', 'all'),
(5, 'Ansökan om medlemsskap', 'Hej! Jag skulle gärna vilja bli medlem. Hur går jag tillväga?', 'Karin', 0, '2013-04-27 20:26:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'karin@fejkmejl.com', 'yes', 'admin'),
(6, 'Välkomna!', 'Så kul att se att så många har hittat till vår hemsida!', 'Anna', 40, '2013-04-27 20:43:56', '2013-04-28 11:18:48', '0000-00-00 00:00:00', 'anactazia@hotmail.com', 'yes', 'all')";

// Execute query
mysqli_query($con,$sql);
}

/**
* Init Table nova_posts
*/		
	public function inittableposts()
	{
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql="DROP TABLE nova_posts";

// Execute query
mysqli_query($con,$sql); 

$sql="CREATE TABLE nova_posts
(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
title VARCHAR(255),
text TEXT,
type ENUM('post','page'),
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
edited DATETIME DEFAULT '0000-00-00 00:00:00',
deleted DATETIME DEFAULT '0000-00-00 00:00:00',
author VARCHAR(255),
userid INT(11),
useremail VARCHAR(255),
showemail ENUM('no','yes'),
image VARCHAR(255),
link VARCHAR(255),
readers ENUM('all','users','admin')
)";

// Execute query
mysqli_query($con,$sql);


$sql="INSERT INTO nova_posts (id, title, text, type, created, edited, deleted, author, userid, useremail, showemail, image, link, readers) 
VALUES
(1, 'Leonardo da Vinci', 'Leonardo di ser Piero da Vinci, född 15 april 1452 i Anchiano 
nära Vinci i Toscana, död 2 maj 1519 i Amboise i Frankrike, var en italiensk konstnär 
och universalgeni. Han var även verksam som arkitekt, ingenjör, uppfinnare och naturforskare. 
Leonardo tillhör renässansens mest betydelsefulla gestalter. Han är mest känd för målningen 
Mona Lisa, målad 1503â€“1506, samt fresken Nattvarden, från 1498.\r\n\r\nI kortform bör han 
kallas \"Leonardo\"och inte exempelvis \"da Vinci\". Namnet \"da Vinci\" betyder bara \"Leonardo, 
herr Pieros son, från Vinci\", detta namn bar han eftersom han var född som oäkting.', 'page', 
'2013-04-27 17:56:48', '2013-04-30 12:19:56', '0000-00-00 00:00:00', 'anna', 40, 
'anactazia@hotmail.com', 'yes', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/themes/images/leonardo.png', 
'leonardodavinci', 'users'),
(2, 'Maj månad snart här!', 'Nu är det vår på allvar, fåglarna kvittrar och solen skiner. 
Synd bara att man inte hinner gå ut...', 'post', '2013-04-28 11:45:07', 
'2013-04-28 17:43:56', '0000-00-00 00:00:00', 'Anna', 40, 'anactazia@hotmail.com', 
'yes', 'http://www.', 'majmånadsnarthär!', 'all'),
(3, 'Första doppet!', 'I år fick jag bada benen tidigt. Min son slängde mössan i havet 
och jag fick springa i. Det var varmare än jag hade föreställt mig, men långt ifrån 
badtemperatur.', 'post', '2013-04-28 11:46:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 
'Anna', 40, 'anactazia@hotmail.com', 'yes', 'http://www.', 'förstadoppet!', 'all'),
(4, 'Michael Jackson', 'Michael Joseph Jackson, född 29 augusti 1958 i Gary i Indiana, död 
25 juni 2009 i Los Angeles i Kalifornien, var en amerikansk sångare, dansare, låtskrivare, 
producent och skådespelare, med stora framgångar under flera årtionden. Han har haft stor 
inverkan på musikindustrin, inte minst anses hans musikvideor ha varit nydanande. Han blev
under 1990-talet även känd för sitt kontroversiella privatliv. Han sågs ofta med en silverhandske 
på sin högra hand.\r\n\r\nMichael Jackson inledde sin karriär 1964 tillsammans med några av sina 
bröder i The Jackson 5. Han påbörjade sin solokarriär 1971 medan han fortfarande var medlem av 
gruppen. Han producerade ett antal av världens bäst säljande musikalbum någonsin och fick 
epitetet The King of Pop (engelska för \"Kungen av Pop\") av sin nära vän Elizabeth Taylor.
Albumet Thriller (1982) är världens mest sålda album genom tiderna med mellan 65 och 105 
miljoner sålda exemplar. Även de fyra albumen Off the Wall (1979), Bad (1987), Dangerous 
(1991) och HIStory (1995) hör till de bäst säljande albumen i världen. Jackson sålde sammantaget
runt 750 miljoner album och singlar under sin karriär.\r\n\r\nUnder 1980-talet anses Jackson 
ha revolutionerat synsättet på musikvideor som en konstform och en marknadsföringskanal. De 
vanligen mycket påkostade videorna blev en stapelvara för den då nya musikkanalen MTV. Bland
de viktigaste kan nämnas Beat It, Billie Jean, Thriller, Black or White och Scream. I sin 
scenshow har han ofta använt danssteget Moonwalk som han därmed har gjort känt över världen. 
Michael Jacksons särpräglade musikaliska stil har under åren influerat många hip hopâ€“, popâ€“ 
och R&Bâ€“artister. Han menade att han själv tagit inspiration från bland annat Jackie Wilson 
och James Brown.\r\n\r\nMichael Jackson blev två gånger inskriven i Rock ''n'' Roll Hall of Fame: 
en gång med The Jackson 5 och en gång som soloartist. Han blev också inskriven i Songwriters Hall 
of Fame.\r\n\r\nJackson avled oväntat och hastigt den 25 juni 2009 efter att ha kollapsat i sin 
hyrda fastighet i Los Angeles vid 50 års ålder. Den 12 oktober 2009 släpptes Michael Jacksons 
singel This Is It postumt.', 'page', '2013-04-28 12:04:57', '0000-00-00 00:00:00', 
'0000-00-00 00:00:00', 'johan', 2, 'johan@email.com', 'no', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/themes/images/michaeljackson.jpg', 
'michaeljackson', 'all'),
(5, 'Vinter', 'Vinter är den kallaste av de fyra årstiderna i områden med tempererat 
klimat.\r\n\r\nEftersom vintern ser så olika ut i olika klimatzoner saknas en allmänt 
erkänd definition. Ett förslag är att vintern på Norra halvklotet omfattar december, 
januari och februari. På Södra halvklotet är det juni, juli och augusti som brukar 
räknas som vintermånader. En annan vinterdefinition är perioden mellan lövfällningen 
och lövsprickningen eller den tid då det mer än bara tillfälligt brukar ligga snö på 
marken.\r\n\r\nI Sverige definierar SMHI vintern som den tid när dygnsmedeltemperaturen 
stadigvarande är under 0&deg;C (meteorologisk vinter). Även i Finland innebär vinter den
period av året då dygnets medeltemperatur ligger under 0 &deg;C.', 'page', '2013-04-28 12:18:38', 
'2013-04-28 17:44:09', '0000-00-00 00:00:00', 'Anna', 40, 'anactazia@hotmail.com', 'yes', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/themes/images/winter.jpg', 
'vinter', 'all'),
(6, 'Vår', 'Vår är inom tempererat klimat en av de fyra årstiderna, som på norra 
halvklotet enligt årets kalenderindelning brukar omfatta månaderna mars, april och maj, 
och på södra halvklotet brukar våren enligt kalender omfatta månaderna september, oktober 
och november.\r\n\r\nVåren är en årstid som förknippas med förnyelse och pånyttfödelse, 
vilket till exempel lett till namngivningen av Pragvåren 1968, då Tjeckoslovakien försökte 
införa en ökad liberalisering av det dåvarande politiska systemet, och den Arabiska våren 
som representerar störtandet av diktaturer och ökad liberalisering i flera arabiska 
stater.\r\nInnehåll\r\n\r\nVår i Sverige\r\n\r\nSMHI definierar meteorologiskt vår som
när dygnsmedeltemperaturen är stigande, stadigvarande mellan 0 och +10 &deg;C i minst 
sju dygn i följd, förutsatt att detta infaller efter den 15 februari. Denna definition 
gäller dock enbart i Sverige, då årstiderna inte ser likadana ut i andra delar av världen. 
Någon internationell meteorologisk definition av vår finns därför heller inte. Enligt 
kalenderindelningen av året börjar våren i Sverige den 1 mars, oavsett väder.\r\n\r\nAnkomsten 
av vissa flyttfåglar och blommande örter brukar av många anses som tecken på att våren har 
kommit. I Sverige är sädesärla ett typiskt exempel på ett sådant vårtecken. Andra vanliga 
saker som anses som vårtecken är islossning och att snön som fallit under vintern smälter, 
vilket ibland kan utlösa vårfloder. Pollenallergi, särskilt från björk och andra lövträd, 
kan vara ett besvär för en del människor på våren.\r\n\r\nVårens normala ankomst 
enligt SMHI:s definition:\r\n\r\n    Malmö: 22 februari\r\n    Stockholm: 16 mars\r\n    
Östersund: 11 april\r\n    Kiruna: 1 maj\r\n', 'page', '2013-04-28 12:21:01', 
'0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Anna', 40, 'anactazia@hotmail.com', 
'yes', 'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/themes/images/spring.jpg', 
'vår', 'all'),
(7, 'Sommar', 'Sommar är en årstid som definieras enligt ett antal olika perspektiv, bland 
annat kalendariskt, astronomiskt och meteorologiskt.\r\n\r\nOlika definitioner\r\n\r\nSommaren 
definieras utifrån ett antal olika synsätt:\r\n\r\nKalendarisk sommar\r\n\r\nEnligt det kalendariska
perspektivet är sommar inom tempererat klimat en årstid som definieras som månaderna juni, juli 
och augusti på norra halvklotet och december, januari och februari på södra halvklotet, 
motsvarande de tre varmaste månaderna under året.\r\nAstronomisk sommar\r\n\r\nUr ett 
astronomiskt perspektiv inleds sommaren med sommarsolståndet omkring den 21 juni på norra
halvklotet och omkring 21 december på södra halvklotet för att sedan avslutas då dag och 
natt är lika långa, på höstdagjämningen. Norra halvklotets sommar infaller samtidigt med 
det södra halvklotets vinter, och vice versa.\r\nMeteorologisk sommar\r\n\r\nUr ett 
meteorologiskt perspektiv definieras sommaren utifrån förändring i temperatur samt bestämd
uppmätt temperatur under viss tid. I Sverige definierar SMHI sommaren som den tid när 
dygnsmedeltemperaturen stadigvarande är över 10 &deg;Celsius.\r\n\r\n<h2>Ã–vergång mellan
årstider</h2>\r\n\r\nÃ–vergången mellan vår och sommar kallas försommar och inträffar på 
norra halvklotet i maj-juni. Sensommar inträffar på norra halvklotet i augusti-september, 
och på södra i februari-mars, och är övergången mellan sommar och höst. Begreppet högsommar
(alternativt \"högsommarvärme\") definieras att högsta temperaturen på dygnet i fråga når +25 
&deg;C eller högre, och gällande värmebölja skall detta upprepas minst fem dagar i 
sträck.\r\n\r\nFör många förknippas sommar med ledighet från jobb och skola i form av 
semester respektive sommarlov. Inom musiken exempelvis Gyllene Tider, Tomas Ledin och 
The Beach Boys då de ofta turnerat och sjungit sånger om sommaren.', 'page', 
'2013-04-28 12:24:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Anna', 40, 
'anactazia@hotmail.com', 'yes', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/themes/images/summer.png', 
'sommar', 'all'),
(8, 'Höst', 'Höst är i det tempererade klimatet en av de fyra årstiderna, på norra halvklotet 
under månaderna september, oktober och november. På södra halvklotet omfattas hösten av 
månaderna mars, april och maj. I astronomisk bemärkelse börjar hösten med höstdagjämningen 
och slutar vid vintersolståndet. SMHI definierar hösten som den årstid när dygnsmedeltemperaturen 
är fallande och ligger mellan 0 och 10 grader.\r\n\r\nOrdet \"höst\" betyder \"skörd\" och är
besläktat med \"hösta\" och \"inhösta\", det vill säga samla eller hämta in. Hösten är alltså 
ursprungligen skördetiden.\r\n\r\nOm hösten går växter in i dormans, de börjar förbereda sig 
för vintervilan. Processen med att löven gulnar sätts igång genom att växterna börjar producera 
abskissinsyra. Klorofyllen försvinner därmed från växter som inte är städsegröna, varigenom de 
gula nyanser som blad och löv alltid har blottläggs. Lövens gulnande hänger samman med att 
växterna gör sig redo för vintervila och då behöver de energin som klorofyllen förbrukar under 
sommaren. b-karoten och flavonoler (quercetin) står för den gula färgen, och mängden varierar
bland olika växter. Blad och löv blir röda av att växten tillverkar antocyaniner under hösten.
Olika växter får därför företrädesvis antingen gula eller röda höstfärger. Nyansen påverkas också 
av vädret, speciellt på aspar vilka kan få båda färgerna; ju mildare och regnigare höst desto 
gulare löv, och ju torrare och kallare desto rödare. Löven och bladen fälls genom att bladfästet
förkorkas. Förkorkningen fördröjs av goda ljusförhållanden, varför träd som står nära en 
ljuskälla behåller löven längre än träd som står mörkt.\r\n\r\nMeteorologiskt består hösten 
av fyra instanser. Först börjar solens uppvärmning att minska, eftersom solen hamnar allt lägre 
på himlen. Av detta följer att det blir stora temperaturskillnader mellan norr och söder 
(respektive söder och norr på södra halvklotet). Temperaturskillnaderna leder till att det blir
fler och kraftigare lågtryck med tillhörande nederbördsområden (antingen regn, snö eller blandning).
Slutligen tränger den kalla luften från norr sig söderut. Vissa år vänder det varma vädret 
tillbaka en stund (i Sverige omkring den 7 oktober), vilket brukar kallas brittsommar, efter
heliga Birgitta. Om det varma vädret kommer efter den första frosten kallas det 
indiansommar.\r\n\r\nHöstdimma eller strålningsdimma, som är vanligt i Skandinavien, 
beror på högtryck, och bildas under natten genom att luften vid marken kyls ner. 
Ju längre tid luften kyls under natten, desto längre tid varar dimman som skingras på 
morgonen när luften värms igen. Om dimman blir riktigt tjock förmår dock inte solen värma marken, 
och då kan dimman bli kvar under dagen. Det är under höst också vanligt med gråmulet väder trots 
högtryck.\r\n\r\nI skönlitteraturen kan hösten symbolisera något som är på avtagande eller döende, 
såsom ålderdomen.', 'page', '2013-04-28 12:26:19', '2013-04-28 23:05:57', '0000-00-00 00:00:00', 
'Anna', 40, 'anactazia@hotmail.com', 'yes', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/themes/images/autumn.jpg', 
'höst', 'all')";

// Execute query
mysqli_query($con,$sql);
}

/**
* Init Table nova_config
*/		
	public function inittableconfig()
	{
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql="DROP TABLE nova_config";

// Execute query
mysqli_query($con,$sql); 

$sql="CREATE TABLE nova_config
(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
name VARCHAR(255),
title_show ENUM('yes','no'),
title VARCHAR(255),
logo_show ENUM('yes','no'),
logo VARCHAR(255),
navmenu ENUM('horisontal','vertical'),
footer_show ENUM('yes','no'),
footer VARCHAR(255),
theme ENUM('default','blue','green','yellow','red'),
base_url VARCHAR(255),
email VARCHAR(255),
index_name VARCHAR(255),
index_show ENUM('yes','no'),
guestbook VARCHAR(255),
guestbook_show ENUM('yes','no'),
blog VARCHAR(255),
blog_show ENUM('yes','no'),
articles VARCHAR(255),
articles_show ENUM('yes','no'),
contact VARCHAR(255),
contact_show ENUM('yes','no'),
page VARCHAR(255),
page_show ENUM('yes','no'),
post VARCHAR(255),
post_show ENUM('yes','no'),
trashcan VARCHAR(255),
trashcan_show ENUM('yes','no'),
gravatar_show ENUM('yes','no'),
admin VARCHAR(255),
profile VARCHAR(255),
login VARCHAR(255),
logout VARCHAR(255)
)";

// Execute query
mysqli_query($con,$sql);

$sql="INSERT INTO nova_config
(id, name, title_show, title, logo_show, logo, navmenu, footer_show, footer, 
theme, base_url, email, index_name, index_show, guestbook, guestbook_show, 
blog, blog_show, articles, articles_show, contact, contact_show, page, page_show, 
post, post_show, trashcan, trashcan_show, gravatar_show, admin, profile, login, logout)
VALUES
(1, 'usersettings', 'yes', 'Nova', 'yes', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/themes/images/logo.png', 
'horisontal', 'yes', '&copy; Anactazia', 'default', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/', 'anactazia@hotmail.com', 
'Hem', 'yes', 'G&auml;stbok', 'yes', 'Blogg', 'yes', 'Artiklar', 'yes', 'Kontakt', 'yes', 
'Info', 'yes', 'Skriv', 'yes', 'Skr&auml;p', 'yes', 'yes', 'Admin', 'Profil', 'Login', 'Logout'),
(2, 'default', 'yes', 'Nova', 'yes', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/themes/images/logo.png', 
'horisontal', 'yes', '&copy; Anactazia', 'default', 
'http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/', 'anactazia@hotmail.com', 
'Hem', 'yes', 'G&auml;stbok', 'yes', 'Blogg', 'yes', 'Artiklar', 'yes', 'Kontakt', 'yes', 'Info', 
'yes', 'Skriv', 'yes', 'Skr&auml;p', 'yes', 'yes', 'Admin', 'Profil', 'Login', 'Logout')";

// Execute query
mysqli_query($con,$sql);



	}






			
}

