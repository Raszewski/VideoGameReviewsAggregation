<?php
  require "header.php";
 ?>

<style>
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
input[type=submit]:hover {
  background-color: #00ff00;
}
/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>

<script>

var subjectObject = {
  "Lista Aktywna": {
    "Fabularna": ["MMORPG", "Rougelike", "Taktyczna", "Akcja", "Open World"],
    "Akcji-przygodowa": ["Metroidvania", "Horror Przetrwania"],
    "Przygodowa": ["Tekstowa", "Graficzna", "Wizualna Nowela", "Interaktywny Film", "Przygoda 3D"],
    "Akcji": ["Platformowa", "Rytmiczna", "Beat em up", "Strzelanka", "Skradanka", "Survival", "Bijatyka"],
    "Strategia": ["RTS", "RTT", "MOBA", "Tower Defence", "TTB", "TBS", "Wojenna"],
    "Symulacyjna": ["Pojazdow", "Zycia", "Budowy i zarzadzania"],
    "Sportowa": ["Wyscigowa", "Dyscyplin Sportowych", "Walki"]
  },
}
window.onload = function() {
  var subjectSel = document.getElementById("opcja");
  var topicSel = document.getElementById("gatunek");
  var chapterSel = document.getElementById("podgatunek");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //puste chaptery i topici
    chapterSel.length = 1;
    topicSel.length = 1;
    //pokaz poprawne wartosci
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  topicSel.onchange = function() {
    //puste chaptery i topici
    chapterSel.length = 1;
    //pokaz poprawne wartosci
    var z = subjectObject[subjectSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
    }
  }
}

</script>


<div class="container">
  <form action="dodaj-gre-akcja.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="ngry">Nazwa gry:</label>
      </div>
      <div class="col-75">
        <input type="text" id="ngry" name="ngry" maxlength="50" placeholder="Nazwa gry...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="txtopis">Opis gry:</label>
      </div>
      <div class="col-75">
        <textarea id="txtopis" name="txtopis" maxlength="1000" placeholder="Opis gry... (Maksymalna ilość znaków: 1000)" style="height:150px"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="platforma">Platforma:</label>
      </div>
      <div class="col-75">
        <select id="platforma" name="platforma">
          <option value="Xbox">Xbox</option>
          <option value="Playstation">Playstation</option>
          <option value="Switch">Switch</option>
          <option value="Gameboy">Gameboy</option>
          <option value="PC">PC</option>
          <option value="Stadia">Stadia</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="opcja">Czy chcesz aktywować listę gatunku? </label>
      </div>
      <div class="col-75">
        <select id="opcja" name="opcja">
          <option value="" selected="selected">Lista Nieaktywna</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="gatunek">Gatunek:</label>
      </div>
      <div class="col-75">
        <select id="gatunek" name="gatunek">
          <option value="" selected="selected">Wybierz opcję</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="podgatunek">Podgatunek:</label>
      </div>
      <div class="col-75">
        <select id="podgatunek" name="podgatunek">
          <option value="" selected="selected">Wybierz opcję</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="producent">Nazwa producenta:</label>
      </div>
      <div class="col-75">
        <input type="text" id="producent" name="producent" maxlength="50" placeholder="Nazwa producenta...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="wydawca">Nazwa wydawcy:</label>
      </div>
      <div class="col-75">
        <input type="text" id="wydawca" name="wydawca" maxlength="50" placeholder="Nazwa wydawcy...">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="submit" value="Umieść grę w bazie danych">
    </div>
    </form>
    </div>






<!--
 <div class="container">
   <form action="dodaj-gre-akcja.php" method="post">
     <div class="row">
       <div class="col-25">
         <label for="gra">Gra:</label>
       </div>
       <div class="col-75">
         <select id="gra" name="gra">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
         </select>
        </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="txt">Treść:</label>
       </div>
       <div class="col-75">
         <textarea id="txt" name="txt" maxlength="45" placeholder="Napisz coś..." style="height:100px"></textarea>
       </div>
     </div>
     <div class="row">
       <input type="submit" name="submit" value="Dodaj gre">
     </div>
   </form>
 </div>
-->
