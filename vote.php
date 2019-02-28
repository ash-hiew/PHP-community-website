<?php
require_once ('MySQLDB.php');
include_once ('myFunctions.php');
require_once ('db.php');

if(isset($_REQUEST['vote'])){
    $vote = $_REQUEST['vote'];
    
}else{
    $vote = null;
}


//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$opt1 = $array[0];
$opt2 = $array[1];
$opt3 = $array[2];
$opt4 = $array[3];

switch($vote){
    case 0:
        $opt1 += 1;
        break;
    case 1:
        $opt2 += 1;
        break;
    case 2:
        $opt3 += 1;
        break;
    case 3:
        $opt4 += 1;
        break;
}

//insert votes to txt file
$insertvote = $opt1."||".$opt2."||".$opt3."||".$opt4;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h2>Result:</h2>
<table class="result-table">
<tr>
<td>New avatars for Theseus and Minotaur</td>
<td>
<img src="images/poll-bar.jpg"
width='<?php echo(100*round($opt1/($opt4+$opt3+$opt2+$opt1),4)); ?>'
height='20'>
<?php echo(100*round($opt1/($opt4+$opt3+$opt2+$opt1),4)); ?>%
</td>
</tr>
<tr>
<td>Multiple Minotaurs</td>
<td>
<img src="images/poll-bar.jpg"
width='<?php echo(100*round($opt2/($opt4+$opt3+$opt2+$opt1),4)); ?>'
height='20'>
<?php echo(100*round($opt2/($opt4+$opt3+$opt2+$opt1),4)); ?>%
</td>
</tr>
<tr>
<td>Reward System - Collect coins in the maze</td>
<td>
<img src="images/poll-bar.jpg"
width='<?php echo(100*round($opt3/($opt4+$opt3+$opt2+$opt1),4)); ?>'
height='20'>
<?php echo(100*round($opt3/($opt4+$opt3+$opt2+$opt1),4)); ?>%
</td>
</tr>
<td>No idea</td>
<td>
<img src="images/poll-bar.jpg"
width='<?php echo(100*round($opt4/($opt4+$opt3+$opt2+$opt1),4)); ?>'
height='20'>
<?php echo(100*round($opt4/($opt4+$opt3+$opt2+$opt1),4)); ?>%
</td>
</tr>
</table>
