<?php

declare(strict_types=1);
require './vendor/autoload.php';

class functionsTest extends PHPUnit\Framework\TestCase
{
    /**
     * processDate() test case.
     */

    //Testing process date function returns correct result when date passed.
    public function testProcessDatePositiveReturn(): void
    {
        require 'functions/functionProcessDate.php';
        $expected = [
            'country',
            'Great, now which country are you planning to visit?',
            '20-06-2021',
        ];
        $this->assertEquals($expected, $processDate('20-06-2021'));
    }
    //Testing processString for date when date passed.
    public function testProcessStringPositiveReturn(): void
    {
        require 'functions/functionProcessString.php';
        $expected = '20/06/2021';
        $this->assertEquals(
            $expected,
            $processString('date', 'I am leaving on the 20-06-2021', null)
        );
    }

    //Testing process date function returns correct result when non date passed.
    public function testProcessDateNegativeReturn(): void
    {
        require 'functions/functionProcessDate.php';
        $expected = [
            'date',
            "I'm sorry I didn't get that date. Can you try again?",
            'banana',
        ];
        $this->assertEquals($expected, $processDate('banana'));
    }

    //Testing in case the date is in the past
    public function testProcessPastDate(): void
    {
        require 'functions/functionProcessDate.php';
        $expected = [
            'date',
            'It would be great to travel back in time! Please enter a future date.',
            '12-02-1995',
        ];
        $this->assertEquals($expected, $processDate('12-02-1995'));
    }

    //Testing when the date is in the wrong format (Y-m-d)
    public function testProcessWrongFormatDate(): void
    {
        require 'functions/functionProcessDate.php';
        $expected = [
            'date',
            "I'm sorry I didn't get that date. Can you try again?",
            '2021-25-12',
        ];
        $this->assertEquals($expected, $processDate('2021-25-12'));
    }

    /**
     * processCountry() test case.
     */

    //Testing processCountry returns the correct string of cities within Ireland
    public function testProcessCountryPostiveReturn(): void
    {
        $irishCities =
            'Moira,Bagenalstown,Carlow,Tullow,Bailieborough,Belturbet,Cavan,Coothill,Ennis,Kilkee,Kilrush,Newmarket-on-Fergus,Shannon,Bandon,Bantry,Blarney,Carrigaline,Charleville,Clonakilty,Cobh,Cork,Drishane,Dunmanway,Fermoy,Kanturk,Kinsale,Macroom,Mallow,Midleton,Millstreet,Mitchelstown,Passage West,Skibbereen,Youghal,Ballybofey,Ballyshannon,Buncrana,Bundoran,Carndonagh,Donegal,Killybegs,Letterkenny,Lifford,Moville,Balbriggan,Ballsbridge,Dublin,Leixlip,Lucan,Malahide,Portrane,Rathcoole,Rush,Skerries,Swords,Athenry,Ballinasloe,Clifden,Galway,Gort,Loughrea,Tuam,Ballybunion,Cahirciveen,Castleisland,Dingle,Kenmare,Killarney,Killorglin,Listowel,Tralee,Athy,Celbridge,Clane,Kilcock,Kilcullen,Kildare,Maynooth,Monasterevan,Naas,Newbridge,Callan,Castlecomer,Kilkenny,Thomastown,Abbeyleix,Mountmellick,Mountrath,Port Laoise,Portarlington,Meath,Carrick-on-Shannon,Abbeyfeale,Kilmallock,Limerick,Newcastle,Rathkeale,Granard,Longford,Moate,Ardee,Drogheda,Drumcar,Dundalk,Ballina,Ballinrobe,Ballyhaunis,Castlebar,Claremorris,Swinford,Westport,Ashbourne,Duleek,Dunboyne,Dunshaughlin,Kells,Laytown,Navan,Trim,Carrickmacross,Castleblayney,Clones,Monaghan,Banagher,Birr,Clara,Edenderry,Kilcormac,Tullamore,Ballaghaderreen,Boyle,Castlerea,Roscommon,Sligo,Co Tyrone,Downpatrick,Dungarvan,Tramore,Waterford,Athlone,Mullingar,Enniscorthy,Gorey,New Ross,Wexford,Arklow,Baltinglass,Blessington,Bray,Greystones,Kilcoole,Newtownmountkennedy,Rathdrum,Wicklow';
        $cityArray = explode(',', $irishCities);
        require 'functions/functionProcessCountry.php';
        $expected = [
            'city',
            'Great, what city in Ireland?',
            'Ireland',
            $cityArray,
        ];
        $this->assertEquals($expected, $processCountry('Ireland'));
    }

    //Testing processCountry returns the correct string after processing a city
    public function testProcessCountryNegativeReturn(): void
    {
        require 'functions/functionProcessCountry.php';
        $expected = [
            'country',
            'I did not get that, can you enter the country again please?',
            'Dublin',
        ];
        $this->assertEquals($expected, $processCountry('Dublin'));
    }
    //Testing input with invalid text parameter of country instead of city
    public function testProcessCityNegativeReturn(): void
    {
        require 'functions/functionProcessCity.php';
        $expected = ['city', "Couldn't Find", 'Ireland', 'Dublin'];
        $this->assertEquals($expected, $processCity('Ireland', 'Dublin'));
    }
    // Tests with number instead of city
    public function testProcessCityWithNumber(): void
        {
           require "functions/functionProcessCity.php";
            $expected = array("city", "Couldn't Find", "Ireland","89");
            $this->assertEquals($expected, $processCity("Ireland", "89"));
        }
    public function testFailure2(): void
    {
        $this->assertEquals('bar', 'bar');
    }
}

?>
