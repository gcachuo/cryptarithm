<?php
/*
A cryptarithm is a mathematical puzzle for which the goal is to find the correspondence between letters and digits, such that the given arithmetic equation consisting of letters holds true when the letters are converted to digits.
 
You have an array of strings crypt, the cryptarithm, and an an array containing the mapping of letters and digits, solution. The array crypt will contain three non-empty strings that follow the structure: [word1, word2, word3], which should be interpreted as the word1 + word2 = word3 cryptarithm.

If crypt, when it is decoded by replacing all of the letters in the cryptarithm with digits using the mapping in solution, the answer is true. If it does not become a valid arithmetic solution, the answer is false.

Example

For crypt = ["SEND", "MORE", "MONEY"] and

solution = [['O', '0'],
            ['M', '1'],
            ['Y', '2'],
            ['E', '5'],
            ['N', '6'],
            ['D', '7'],
            ['R', '8'],
            ['S', '9']]
the output should be
isCryptSolution(crypt, solution) = true.

When you decrypt "SEND", "MORE", and "MONEY" using the mapping given in crypt, you get 9567 + 1085 = 10652 which is correct and a valid arithmetic equation.
*/

function isCryptSolution($crypt, $solution){  
  $results=[];
  foreach($crypt as $string){
    $result="";   
    foreach(str_split($string) as $key=> $letter){
      foreach($solution as $pair){
        if($pair[0]==$letter){
          if($pair[1]==0 && $key==0){
                 continue;
          }
          else{
            $result.=$pair[1];     
          }
        }
      }
    }    
      $results[]=$result;      
  }
  
  $total=0;
  for($i=0; $i<count($results)-1;$i++){
    $total+=$results[$i];
  }
    return $total==end($results);
}

$solution=[['O', '0'],
            ['M', '1'],
            ['Y', '2'],
            ['E', '5'],
            ['N', '6'],
            ['D', '7'],
            ['R', '8'],
            ['S', '9']];
$crypt=["SEND", "MORE", "MONEY"];
  echo isCryptSolution($crypt,$solution)?'true':'false';

$crypt= ["TEN", 
 "TWO", 
 "ONE"];
$solution= [["O","1"], 
 ["T","0"], 
 ["W","9"], 
 ["E","5"], 
 ["N","4"]];

if(isCryptSolution($crypt, $solution))
  echo "Correct\n";
else
  echo "Wrong\n";

$crypt= ["A", "A", "A"];
$solution= [["A","0"]];

if(isCryptSolution($crypt, $solution))
  echo "Correct\n";
else
  echo "Wrong\n";
