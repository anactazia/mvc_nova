mvc_nova
========
<p>Välkommen att ladda hem NOVA - ett MVC ramverk utvecklat för att vara lätt att använda.</p>

<p>En referensinstallation av nova finns <a href="http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova">här</a></p>

<p>För att ladda hem NOVA så kan du antingen använda dig av länken på NOVAs hemsida eller så kan du klona från 
Git med följande kommando:</p>
<code>git clone git://github.com/anactazia/mvc_nova.git</code><br />
<h2>Installation</h2>
<p>Efter att du laddat hem NOVA så laddar du upp mappen med NOVA på din server.<br />
När den ligger på plats så pekar du din webbläsare på din rotkatalog och lägger till /install/ på slutet av adressen</p>
<h5>Exempel: http://www.student.bth.se/~anza13/phpmvc/me/kmom08-10/mvc_nova/install/</h5>
Sedan följer du instruktionerna i en kort installationsprocess.

Se info sidan på NOVAs hemsida för information om vad som behövs innan du laddar hem NOVA.

<h1>NOVA</h1>

<h2>Index</h2>
<p>Den första sidan du kommer till när du öppnar NOVA är indexsidan. Sidan är uppdelad i ett rutnät.
Där kan man visa bilder och ha länkar. Där finns även en länk för att ladda ner ramverket.
I de tre nedre rutorna finns länkar till sidor med lite information om vad man kan göra på sidan.</p>

<h2>Gästbok</h2>
<p>I Gästboken kan man skriva meddelanden. Där har de som är inloggade användare en fördel i att 
de kan ändra i och ta bort sina egna meddelande. När man skapar meddelandet så väljer man om man
vill att alla skall kunna se det, eller om man vill att bara inloggade användare skall kunna se det. Man kan
även välja att bara administratören kan se meddelandet.<p>

<h2>Papperskorg</h2>
<p>Om man väljer att ta bort sitt meddelande så skickas detta till papperskorgen, vilken man kommer
åt via länken uppe i högra hörnet som ser ut som en papperskorg. I papperskorgen kan man välja
att antingen ta bort meddelandet permanent, eller återställa det till gästboken igen.<p>

<h2>Blog och Artiklar</h2>
<p>När man är inloggad användare så kan man skriva inlägg i Bloggen och skriva artiklar. Man kommer åt 
funktionen genom den lilla ikonen uppe i högra hörnet som ser ut som ett papper med en penna.
När man skriver ett inlägg så väljer man om det skall vara till bloggen eller till artikelsidan.
Man väljer även vilka man vill skall kunna se inlägget eller artikeln. Här kan man som i gästboken
ändra och ta bort sina inlägg och artiklar.
Skillnaden mellan bloggsidan och artikelsidan är att på artikelsidan visas bara en del av texten, och 
om man vill läsa mer så finns en länk till en separat sida för artikeln. Här har man möjlighet att 
visa en bild bredvid artikeln.<p>

<h2>Kontakt</h2>
<p>Det finns en kontaktsida med ett formulär som skickar mail automatiskt till sidans innehavare.<p>

<h2>Info</h2>
<p>På infosidan kan man läsa lite om vad man behöver ha installerat på sin dator innan man laddar hem NOVA.
Där finns även en länk för att ladda ner nova och länkar för att ladda ner server och klient.<p>

<h2>Administratör</h2>
<p>Administratören kan se alla meddelande, inlägg och artiklar. Han/hon har även möjlighet att ta bort
meddelande, inlägg och artiklar om de är opassande.
När administratören är inloggad så kommer det upp en extra flik där man kommer åt listan med alla
användare och man kan skapa, ändra och ta bort användare. Där kan man även ändra behörighet på användare
som automatiskt blir användare när de skapar ett nytt konto. Endast administratören kan alltså 
göra om en användare till administratör.<br />
Som inloggad administratör har man även tillgång till en länk till inställningar för sidan. 
När man trycker på länken kommer man till sidan för inställningar.
Där finns tre val. Den första länken går till inställningarna för temat. Här kan man  ändra
i formuläret för att ändra i temat. Den andra länken går till en sida där man kan återställa tabellerna
i databasen. Den tredje och sista länken går till ett formulär där man kan ändra namn och lösenord för
administratören.<p>

<h2>Användare</h2>
<p>När man är inloggad användare så kan man ändra i sina uppgifter. Det gör man under fliken profil.
Man har tillgång till sidan där man kan skriva inlägg och artiklar. Därefter kan man ändra och 
välja att ta bort sina egna artiklar och slänga dem i papperskorgen. Därifrån kan användaren själv
bestämma om det skall tas bort permanent eller återställas.<p>

<h2>Tema</h2>
<p>Temat går att ändra på flera sätt. Man kan välja olika färger, om man vill ha en horisontal navigeringsmeny
eller om det skall vara en vertikal. Man kan även ändra Titel på sidan, Logo-bilden och Footern. 
Om man vill så finns det möjlighet att byta namn på alla sidorna, och då byts även namnet på fliken
i menyn. Man kan även välja att dölja flikar för att inte visa sidor och även ikonerna går att dölja.
Om man väljer att dölja Bloggen och Artikelsidan så försvinner länken till sidan där man kan skriva
inlägg och artiklar automatiskt. Tar man även bort Gästboken så försvinner papperskorgen med. 
Uppe i Högra hörnet finns en gravatarbild, den går även den att välja om man vill se eller dölja.
Allt detta görs genom att gå in i inställningarna för temat. <p>

<h2>Login och Signup</h2>
<p>Om man inte har ett användarkonto så finns en länk på loginsidan där man kan skapa ett konto. När man
gör detta så skickas det automatiskt ett mail till användaren. Han / hon månste sedan aktivera sitt
konto med hjälp av en länk som följer med mailet. Innan dess kan man inte logga in.<p>

