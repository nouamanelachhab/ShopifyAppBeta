<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<h1>Ajouter un contact</h1>
<form method="post" action="https://b93c1f19a9c5.ngrok.io/api/order">
<label>Civilité</label>
<select name="civilite">
<option value="Madame">Madame</option>
<option value="Monsieur" selected>Monsieur</option>
</select>
<br>
<label>Prénom</label> <input type="text" name="prenom">
<label>Nom</label> <input type="text" name="nom">
<label>Email</label> <input type="email" name="email">
<label>Date de naissance</label> <input type="date" name="date_naissance">
<br>
<input type="submit" value="Ajouter" class="kaoutarbtn" id="kaoutarbtn">
</form>
<p>
<?php
?>
</p>
</body> 
</html>