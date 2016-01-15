<?xml version = "1.0"  encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  
  
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title> Process the Fruit Stall form </title>
  </head>
  <body>
    <?php

// Get form data values

      $name = $_POST["name"];
	  $apples = $_POST["apples"];
      $oranges = $_POST["oranges"];
      $bananas = $_POST["bananas"];
      $payment = $_POST["payment"];

// If any of the quantities are blank, set them to zero

      if ($apples == "") $apples = 0;
      if ($oranges == "") $oranges = 0;
      if ($bananas == "") $bananas = 0;

// Compute the item costs and total cost

      $apples_cost = 0.69 * $apples;
      $oranges_cost = 0.59 * $oranges;
      $bananas_cost = 0.39 * $bananas;
	  $total_cost=$apples_cost+ $oranges_cost+$bananas_cost;
	  
// Return the results to the browser in a table

    ?>
    <h4> Customer: </h4>
    <?php
      print ("Name : $name <br />");
    ?>
    <p /> <p />

    <table border = "border">
      <caption> Order Information </caption>
      <tr>
        <th> Product </th>
        <th> Unit Price </th>
        <th> Quantity Ordered </th>
        <th> Item Cost </th>
      </tr>
      <tr align = "center">
        <td> Apples </td>
        <td> $0.69 </td>
        <td> <?php print ("$apples"); ?> </td>
        <td> <?php printf ("$ %4.2f", $apples_cost); ?>
        </td>
      </tr>
      <tr align = "center">
        <td> Oranges </td>
        <td> $0.59 </td>
        <td> <?php print ("$oranges"); ?> </td>
        <td> <?php printf ("$ %4.2f", $oranges_cost); ?>
        </td>
        </tr>
      <tr align = "center">
        <td> Bananas </td>
        <td> $0.39 </td>
        <td> <?php print ("$bananas"); ?> </td>
        <td> <?php printf ("$ %4.2f", $bananas_cost); ?>
        </td>
      </tr>
	  	<tr align = "center">
        <td> Payment mode : 
        </td>
	<td colspan="3"> <?php printf ($payment); ?>
        </td>
      </tr>
	  <tr align = "center">
        <td> Total : 
        </td>
	<td colspan="3"> <?php printf ("$ %4.2f", $total_cost); ?>
        </td>
      </tr>
    </table>
    <p /> <p />

	
	<?php
      $apple = $_POST["apples"]; 
      $orange = $_POST["oranges"];
      $banana = $_POST["bananas"]; 

	 //opens the file and read line by line
	$myfile_line = file("order.txt" ); 
	
	//if it is an empty text file, fills every row with empty space to prevent error
	for ($x = 0; $x <= 10; $x++) {
		if(empty($myfile_line[$x]))
			$myfile_line[$x]=" ";
	} 

	//replaces anything which is not a number with "" line by line
    $apples_cumulative=preg_replace("/[^0-9]/","",$myfile_line[0]); 
	$oranges_cumulative=preg_replace("/[^0-9]/","",$myfile_line[1]); 
	$bananas_cumulative=preg_replace("/[^0-9]/","",$myfile_line[2]);	

	//sums the existing value in the text file and the newly entered value
	$apples_total=$apple+ (int)$apples_cumulative; 
	$oranges_total=$orange+(int)$oranges_cumulative; 
	$bananas_total=$banana+(int)$bananas_cumulative; 
	
	//contents to be written back to the file
	$apples_content="Total number of apples: $apples_total\r\n";
	$oranges_content="Total number of oranges: $oranges_total\r\n";
	$bananas_content="Total number of bananas: $bananas_total\r\n";

	//writes back into the file
	$file = fopen("order.txt","w+");
	fwrite ($file,$apples_content);
	fwrite ($file,$oranges_content);
	fwrite ($file,$bananas_content);
	fclose($file);
    ?>
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  </body>
</html>
