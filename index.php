<?php
error_reporting(0);
?><!DOCTYPE html>
<html>
<head>
<style>
table,td,tr{
    border:1px solid black;
    padding:20px;
}
</style>
</head>
<body>
<table>
<tr>
<td>
Player A
</td>
<td>
Player B
</td>
<td>
Score A
</td>
<td>
Score B
</td>
</tr>
<tr>
    <?php
    $count_balls=0;
   $teama_total_score=0;
   $teamb_total_score=0;
   
   class teama{
       public $r1,$r2,$r3,$r4,$r5;
       public function __construct($r1,$r2,$r3,$r4,$r5)
       {
           //player a
   $this->player1=array($r1,$r2,$r3,$r4,$r5);
   $this->keya=array_rand($this->player1);
   $this->teama_run=$this->player1[$this->keya];
   
   //player b
   $this->player2=array($r1,$r2,$r3,$r4,$r5);
   $this->keyb=array_rand($this->player2);
   $this->teamb_run=$this->player2[$this->keyb];
   
       }
   public function getscore_a()
   {
       echo $this->teama_run;
   }
   public function getscore_b()
   {
       echo $this->teamb_run;
   }
   }
   $count_balls=0;
    if(isset($_POST['submit']))
    { 
        
        $teama_prev_score=$_POST['teama_prev_score'];
        $teamb_prev_score=$_POST['teamb_prev_score'];
        $count_balls=$_POST['count_balls'];
        $count_balls++;
       
        if($count_balls<=6)
        {
       
        ?>
<td>
<?php
echo 'Batting - ';
$play=new teama("1","2","3","4","6");
$play->getscore_a();
?>
<td>
<?php
echo 'Bowling - ';
$play->getscore_b();
?>
</td>
<td>
<?php

 if($play->teama_run==$play->teamb_run)
   {
     echo "PLAYER A OUT - ";
     $count_balls=7;
     $teama_total_score=$teama_prev_score;
    }
    else{

    $teama_total_score=$teama_prev_score+$play->teama_run;

    }
    echo $teama_total_score;
?>
</td>
<td>
<?php

?></td>
<?php
}
else if($count_balls>6&&$count_balls<=12){
    ?>
    <td>
    <?php
    $play1=new teama("1","2","3","4","6");
    echo 'Bowling - ';
    $play1->getscore_a();
    ?>
    </td>
    <td>
    <?php
    echo 'Batting - ';
    $play1->getscore_b();
    ?>
    </td>
    <td>
    <?php
    $teama_total_score=$teama_prev_score;
    echo $teama_prev_score;
    ?></td>
    <td>
    <?php
    if($play1->teama_run==$play1->teamb_run)
    {
        echo "PLAYER B OUT";
        $teamb_total_score=$teamb_prev_score;
        $count_balls=13;
    }
   else{
      $teamb_total_score=$teamb_prev_score+$play1->teamb_run;
      
    }
    echo $teamb_total_score; 
  
    ?>
    </td>
    
<?php

}
else{
    
    if($teama_prev_score>$teamb_prev_score)
    {
echo 'Team A Won the match';
$count_balls=0;
    }
    else if($teama_prev_score<$teamb_prev_score){
        echo 'Team B Won the match';     
        $count_balls=0;  
    }
    else{
        echo 'Match Tie';
    }
    
}
?>

</tr>
<?php
}
?>


</table>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
<input type="hidden"  name="count_balls" value="<?php echo $count_balls; ?>" />
<input type="hidden"  name="teama_prev_score" value="<?php echo $teama_total_score; ?>" />
<input type="hidden"  name="teamb_prev_score" value="<?php echo $teamb_total_score; ?>" />
<button type="submit"  name="submit" value="play">play</button>
</form> 
</body>
</html>