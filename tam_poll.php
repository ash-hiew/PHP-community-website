<html>
<head>
<meta charset="utf-8">
    <script type="text/javascript" src="js/voting-function.js"></script>
</head>

<?php


$poll = 
  '<div id="poll">
    <div class="poll-question">
        <h4>What feature would you like to see in the next maze level?</h4>
    </div>
    <form name="form">
        <div class="poll-options">
            <div class="poll-option">
                <div class="option-border" style="background-color: #F0F8FF">
                <input type="radio" class="radvalue" name="vote" value="0" id="o1" onclick="getVote(this.value);">
                <label for="o1">New avatars for Theseus and Minotaur</label><br></div>

                <div class="option-border" style="background-color: #FFEBCD">
                <input type="radio" class="radvalue" name="vote" value="1" id="o2" onclick="getVote(this.value);">
                <label for="o2">Multiple Minotaurs</label><br>
                </div>
                
                <div class="option-border" style="background-color: #F8F8FF">
                <input type="radio" class="radvalue" name="vote" value="2" id="o3" onclick="getVote(this.value);">
                <label for="o3">Reward System - Collect coins in the maze</label><br>
                </div>
                
                <div class="option-border" style="background-color:#90EE90">
                <input type="radio" class="radvalue" name="vote" value="3" id="o4" onclick="getVote(this.value);">
                <label for="o4">No idea</label><br>
                </div>
            </div>
        </div>
        
    </form>
  </div>';
?>
</html>