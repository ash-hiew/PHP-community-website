<?php
// community
if($_SESSION['selected_comm'] == 'tam')
{
    $commName = $_SESSION['selected_comm'];
    $comm_banner = 'images/tam-banner.png';
    $comm_heading = 'Theseus and the Minotaur Maze Game';
    $comm_quote = 'Theseus and the Minotaur is a type of logic maze designed by Robert Abbott. In this maze, the player acts as Theseus, the king of Athens who is attempting to escape the Labyrinth. The main difference between this and the standard type of labyrinth, beyond the fact that it is set on a grid, is the fact that the maze is not empty, but also contains a Minotaur who hunts the player down, taking two steps for every one the player takes.';
    $comm_quote_two = 'While the Minotaur is faster than the player, his moves are predictable and often inefficient: they are determined by checking to see if he can get closer to the player by moving horizontally, then checking to see if he can get any closer by moving vertically. If neither move would place him closer to the player, the Minotaur skips his turn. Theseus may also skip his turn.';
    $comm_image = 'images/maze-play.png';

}
if($_SESSION['selected_comm'] == 'hindi')
{
    $commName = $_SESSION['selected_comm'];
    $comm_banner = 'images/hindi-banner.png';
    $comm_heading = 'History of Hindi Language';
    $comm_quote = 'The Hindi language (हिंदी) is written in Devanagari script and influenced by one of the most important and studied languages in history, Sanskrit. Hindi is considered to be the official language of the government of India and one of the 22 recognized languages of India. Around 545 million people speak Hindi in India, 425 million consider it their first language and 120 million consider it their second language. It is the fourth most widely spoken language in the world.';
    $comm_quote_two = 'One of the most common words many foreigners know from Hindi is "Namaste", which is an expression of warm greetings. Similar to this term, many words in Hindi have certain warmth and a lot of feelings behind them.';
    $comm_image = 'images/hindi-char.png';
}
?>