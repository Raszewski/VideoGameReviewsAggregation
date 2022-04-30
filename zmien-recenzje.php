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


 <div class="container">
   <form action="zmien-recenzje-akcja.php" method="post">
     <div class="row">
       <div class="col-25">
         <label for="nazwaGry">Nazwa Gry:</label>
       </div>
       <div class="col-75">
         <input type="text" id="nazwaGry" name="nazwaGry" placeholder="Nazwa gry...">
       </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="czasGry">Czas Gry:</label>
       </div>
       <div class="col-75">
         <input type="text" id="czasGry" name="czasGry" maxlength="4" placeholder="Liczba godzin grania w daną grę...">
       </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="ocenaGrafiki">Ocena Grafiki:</label>
       </div>
       <div class="col-75">
         <select id="ocenaGrafiki" name="ocenaGrafiki">
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
         </select>
       </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="ocenaMuzyki">Ocena Muzyki:</label>
       </div>
       <div class="col-75">
         <select id="ocenaMuzyki" name="ocenaMuzyki">
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
         </select>
       </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="ocenaRozgrywki">Ocena Rozgrywki:</label>
       </div>
       <div class="col-75">
         <select id="ocenaRozgrywki" name="ocenaRozgrywki">
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
         </select>
       </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="ocenaFabuly">Ocena Fabuły:</label>
       </div>
       <div class="col-75">
         <select id="ocenaFabuly" name="ocenaFabuly">
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
         </select>
       </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="ukonczenie">Stopień Ukończenia Gry:</label>
       </div>
       <div class="col-75">
         <select id="ukonczenie" name="ukonczenie">
           <option value="Gra niedokonczona">Gra niedokończona</option>
           <option value="Gra ukonczona">Gra ukończona</option>
           <option value="Gra ukonczona na 100">Gra ukończona w 100%</option>
         </select>
       </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="tekstRecenzji">Treść Recenzji:</label>
       </div>
       <div class="col-75">
         <textarea id="tekstRecenzji" name="tekstRecenzji" maxlength="1000" placeholder="Napisz swoją recenzję... (Maksymalna ilość znaków: 1000)" style="height:150px"></textarea>
       </div>
     </div>
     <div class="row">
       <input type="submit" name="submit" value="Zmień Recenzje">
     </div>
   </form>
 </div>











<?php
/*  $gra = isset($_GET['gra']) ? $_GET['gra'] : '';
  $Ocena1 = isset($_GET['ocena1']) ? $_GET['ocena1'] : '';
  $Ocena2 = isset($_GET['ocena2']) ? $_GET['ocena2'] : '';
  $Ocena3 = isset($_GET['ocena3']) ? $_GET['ocena3'] : '';
  $Ocena4 = isset($_GET['ocena4']) ? $_GET['ocena4'] : '';
  */
?>


 <?php
   require "footer.php";
  ?>
