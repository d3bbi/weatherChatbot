<?php declare(strict_types=1);
require './vendor/autoload.php';



class functionsTest extends PHPUnit\Framework\TestCase {
/**
 * processDate() test case.
 */

	//Testing process date function returns correct result when date passed.
    public function testProcessDatePositiveReturn(): void
    {
		require "functions/functionProcessDate.php";
		
		$expected = array("country","Great, now which country are you planning to visit?","20-06-2021");
		
        $this->assertEquals($expected,$processDate("20-06-2021"));
    }
	//Testing process date function returns correct result when non date passed.
    public function testProcessDateNegativeReturn(): void
    {
		require "functions/functionProcessDate.php";
		$expected = array("date","I'm sorry I didn't get that date. Can you try again?","banana");
		
        $this->assertEquals($expected,$processDate("banana"));
    }
	
	//Testing processCountry returns the correct string of cities within Ireland
    public function testProcessCountryPostiveReturn(): void
    {
		$irishCities = "Moira,Bagenalstown,Carlow,Tullow,Bailieborough,Belturbet,Cavan,Coothill,Ennis,Kilkee,Kilrush,Newmarket-on-Fergus,Shannon,Bandon,Bantry,Blarney,Carrigaline,Charleville,Clonakilty,Cobh,Cork,Drishane,Dunmanway,Fermoy,Kanturk,Kinsale,Macroom,Mallow,Midleton,Millstreet,Mitchelstown,Passage West,Skibbereen,Youghal,Ballybofey,Ballyshannon,Buncrana,Bundoran,Carndonagh,Donegal,Killybegs,Letterkenny,Lifford,Moville,Balbriggan,Ballsbridge,Dublin,Leixlip,Lucan,Malahide,Portrane,Rathcoole,Rush,Skerries,Swords,Athenry,Ballinasloe,Clifden,Galway,Gort,Loughrea,Tuam,Ballybunion,Cahirciveen,Castleisland,Dingle,Kenmare,Killarney,Killorglin,Listowel,Tralee,Athy,Celbridge,Clane,Kilcock,Kilcullen,Kildare,Maynooth,Monasterevan,Naas,Newbridge,Callan,Castlecomer,Kilkenny,Thomastown,Abbeyleix,Mountmellick,Mountrath,Port Laoise,Portarlington,Meath,Carrick-on-Shannon,Abbeyfeale,Kilmallock,Limerick,Newcastle,Rathkeale,Granard,Longford,Moate,Ardee,Drogheda,Drumcar,Dundalk,Ballina,Ballinrobe,Ballyhaunis,Castlebar,Claremorris,Swinford,Westport,Ashbourne,Duleek,Dunboyne,Dunshaughlin,Kells,Laytown,Navan,Trim,Carrickmacross,Castleblayney,Clones,Monaghan,Banagher,Birr,Clara,Edenderry,Kilcormac,Tullamore,Ballaghaderreen,Boyle,Castlerea,Roscommon,Sligo,Co Tyrone,Downpatrick,Dungarvan,Tramore,Waterford,Athlone,Mullingar,Enniscorthy,Gorey,New Ross,Wexford,Arklow,Baltinglass,Blessington,Bray,Greystones,Kilcoole,Newtownmountkennedy,Rathdrum,Wicklow";
		$cityArray = explode(",",$irishCities);
		require "functions/functionProcessCountry.php";
		$expected = array("city","Great, what city in Ireland?","Ireland",$cityArray);
		
        $this->assertEquals($expected,$processCountry("Ireland"));
    }

    public function testFailure2(): void
    {
        $this->assertEquals('bar', 'bar');
    }
}

?>