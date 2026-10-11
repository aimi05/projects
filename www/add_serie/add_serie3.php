<?php session_start();
  include("connection.php");
   /* Kontrolle, ob innerhalb der Session */
   if (!isset($_SESSION["n"])){
      exit("<p>Kein Zugang<br /><a href='add_serie.php'>Zum Login</a></p>");
    }
    /*$Servername = "localhost";
    $Username = "root";
    $Password = "root";
    $DBNAME = "media";
    $port = "3306";
    $con = mysqli_connect($Servername, $Username, $Password, $DBNAME,$port);*/
      if(!$con)
      {
        exit("Verbindungsfehler: ".mysqli_connect_error());
      }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $title_name = $_POST['title_name'];
      $media_bg_cover = $_POST['media_bg_cover'];
      $title_img = $_POST['title_img'];
      $release_year = $_POST['release_year'];
      $fsk = $_POST['fsk'];
      $length = $_POST['hour']. "h ".$_POST['min']. "min";
      $genre = $_POST['genre'];
      $blurb = $_POST['blurb'];
      $folgen = $_POST['folgen'];
      $folge1 = $_POST['folge1'];
      $folge2 = $_POST['folge2'];
      $folge3 = $_POST['folge3'];
      $folge4 = $_POST['folge4'];
      $folge5 = $_POST['folge5'];
      $folge6 = $_POST['folge6'];
      $folge7 = $_POST['folge7'];
      $folge8 = $_POST['folge8'];
      $folge9 = $_POST['folge9'];
      $folge10 = $_POST['folge10'];
      $folge11 = $_POST['folge11'];
      $folge12 = $_POST['folge12'];
      $folge13 = $_POST['folge13'];
      $folge14 = $_POST['folge14'];
      $folge15 = $_POST['folge15'];
      $folge16 = $_POST['folge16'];
      $folge17 = $_POST['folge17'];
      $folge18 = $_POST['folge18'];
      $folge19 = $_POST['folge19'];
      $folge20 = $_POST['folge20'];
      $folge21 = $_POST['folge21'];
      $folge22 = $_POST['folge22'];
      $folge23 = $_POST['folge23'];
      $folge24 = $_POST['folge24'];
      $folge25 = $_POST['folge25'];
      $folge26 = $_POST['folge26'];
      $folge27 = $_POST['folge27'];
      $folge28 = $_POST['folge28'];
      $folge29 = $_POST['folge29'];
      $folge30 = $_POST['folge30'];
      $folge31 = $_POST['folge31'];
      $poster_height = $_POST['poster_height'];
      $poster_width = $_POST['poster_width'];
      if( !empty($title_name) && !empty($media_bg_cover) && !empty($title_img)&& !empty($release_year) && !empty($fsk) && !empty($length) && !empty($genre) && !empty($blurb) && !empty($poster_height) && !empty($poster_width)){

        $query = "INSERT INTO `serie` (`media_id`, `title_name`, `media_bg_cover`, `title_img`, `release_year`, `fsk`, `length`, `genre`, `blurb`, `folge1`, `folge2`, `folge3`, `folge4`, `folge5`, `folge6`, `folge7`, `folge8`, `folge9`, `folge10`, `folge11`, `folge12`, `folge13`, `folge14`, `folge15`, `folge16`, `folge17`, `folge18`, `folge19`, `folge20`, `folge21`, `folge22`, `folge23`, `folge24`, `folge25`, `folge26`, `folge27`, `folge28`, `folge29`, `folge30`, `folge31`, `poster_height`, `poster_width`, `folgen`) VALUES (NULL, '$title_name', '$media_bg_cover', '$title_img', '$release_year', '$fsk', '$length', '$genre', '$blurb', '$folge1', '$folge2', '$folge3', '$folge4', '$folge5', '$folge6', '$folge7', '$folge8', '$folge9', '$folge10', '$folge11', '$folge12', '$folge13', '$folge14', '$folge15', '$folge16', '$folge17', '$folge18', '$folge19', '$folge20', '$folge21', '$folge22', '$folge23', '$folge24', '$folge25', '$folge26', '$folge27', '$folge28', '$folge29', '$folge30', '$folge31', '$poster_height', '$poster_width', '$folgen');";
        mysqli_query($con,$query);
        echo "datenpakt gesendet";

      }else {
        echo "Füllen sie bitte alle Felder aus !";
      }
    }
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>ADD SERIE</title>
   </head>
   <body>
     <h3>Serie Hinzufügen</h3>
     <p><a href="add_serie.php">Abmeldung</a></p>
     <form method="post">
        <p>Titel des Medium (Text)<input name="title_name"></p>
        <p>Hintergrund der Page (Link)<input name="media_bg_cover"></p>
        <p>Titel in Bildform (Link)<input name="title_img"></p>
        <p>Veröffenlichungsdatum: </p>
          <select id="year" name="release_year">
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
          </select> <! input des Veröffentlichungsdatum!>
          <br>
          <p>Freigabe: </p>
          <select id="fsk" name="fsk">
            <option value="0+">0+</option>
            <option value="6+">6+</option>
            <option value="12+">12+</option>
            <option value="16+">16+</option>
            <option value="18+">18+</option>
          </select> <!input fsk !>
          <br> <p>Länge des Mediums: </p>
          <select id="hour" name="hour">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select> Stunden<!input für die Studendauer des filmes!>
          <select id="min" name="min">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>
            <option value="56">56</option>
            <option value="57">57</option>
            <option value="58">58</option>
            <option value="59">59</option>
          </select> Minuten <!input für die minuten des filmes!>
          <br>
          <p>Genre des Films: <input name="genre"></p> <!input des Genre des film!>
          <p>Klappentext des Films: <br><textarea id="text" name="blurb" cols="55" rows="6"></textarea></p> <!input des Klappentextes>
          <p>Anzahl der Folgen:<input name="folgen"></p>
          <p>Folge 1:<input name="folge1"></p>
          <p>Folge 2:<input name="folge2"></p>
          <p>Folge 3:<input name="folge3"></p>
          <p>Folge 4:<input name="folge4"></p>
          <p>Folge 5:<input name="folge5"></p>
          <p>Folge 6:<input name="folge6"></p>
          <p>Folge 7:<input name="folge7"></p>
          <p>Folge 8:<input name="folge8"></p>
          <p>Folge 9:<input name="folge9"></p>
          <p>Folge 10:<input name="folge10"></p>
          <p>Folge 11:<input name="folge11"></p>
          <p>Folge 12:<input name="folge12"></p>
          <p>Folge 13:<input name="folge13"></p>
          <p>Folge 14:<input name="folge14"></p>
          <p>Folge 15:<input name="folge15"></p>
          <p>Folge 16:<input name="folge16"></p>
          <p>Folge 17:<input name="folge17"></p>
          <p>Folge 18:<input name="folge18"></p>
          <p>Folge 19:<input name="folge19"></p>
          <p>Folge 20:<input name="folge20"></p>
          <p>Folge 21:<input name="folge21"></p>
          <p>Folge 22:<input name="folge22"></p>
          <p>Folge 23:<input name="folge23"></p>
          <p>Folge 24:<input name="folge24"></p>
          <p>Folge 25:<input name="folge25"></p>
          <p>Folge 26:<input name="folge26"></p>
          <p>Folge 27:<input name="folge27"></p>
          <p>Folge 28:<input name="folge28"></p>
          <p>Folge 29:<input name="folge29"></p>
          <p>Folge 30:<input name="folge30"></p>
          <p>Folge 31:<input name="folge31"></p>
          <p>Hochkant Cover (Link)<input name="poster_height"></p> <!input für den Link des Covers hochformat>
          <p>Querformat Cover(Link)<input name="poster_width"></p> <!input für den Link des covers querformat>

        <input type="submit">
     </form>
   </body>
 </html>
 <style media="screen">
   p{
     font-weight: 500;

   }
 </style>
