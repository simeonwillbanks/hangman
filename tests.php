<?php
/**
 * Tests for Hangman Game
 * 
 * @author simeon f. willbanks <sfw@simeonfosterwillbanks.com>
 * @version 0.2
 * @package hangman
 */
 
require 'hangmangame.php';

// Activate assert and make it quiet
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1); 

// Create a handler function
function my_assert_handler($file, $line, $code)
{
    echo 'Assertion failed on line '.$line."\n";
}

// Set up the callback
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

// Store assertion results so runner can report success
$pass = array();

echo "\nHangman Tests\n-------------\n";

// Game one
$word = "simeon";
$game = new HangmanGame($word);
$game->guess("s");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("s", "", "", "", "", ""));
$pass[] = assert($game->misses === array());
$pass[] = assert(count($game->misses) === 0);
$game->guess("a");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("s", "", "", "", "", ""));
$pass[] = assert($game->misses === array("a"));
$pass[] = assert(count($game->misses) === 1);
$game->guess("b");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("s", "", "", "", "", ""));
$pass[] = assert($game->misses === array("a", "b"));
$pass[] = assert(count($game->misses) === 2);
$game->guess("c");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("s", "", "", "", "", ""));
$pass[] = assert($game->misses === array("a", "b", "c"));
$pass[] = assert(count($game->misses) === 3);
$game->guess("d");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("s", "", "", "", "", ""));
$pass[] = assert($game->misses === array("a", "b", "c", "d"));
$pass[] = assert(count($game->misses) === 4);
$game->guess("e");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("s", "", "", "e", "", ""));
$pass[] = assert($game->misses === array("a", "b", "c", "d"));
$pass[] = assert(count($game->misses) === 4);
$game->guess("f");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("s", "", "", "e", "", ""));
$pass[] = assert($game->misses === array("a", "b", "c", "d", "f"));
$pass[] = assert(count($game->misses) === 5);
$game->guess("g");
$pass[] = assert($game->state === HangmanGame::LOSS);
$pass[] = assert($game->correct_positions === array("s", "", "", "e", "", ""));
$pass[] = assert($game->misses === array("a", "b", "c", "d", "f", "g"));
$pass[] = assert(count($game->misses) === 6);

// Game two
$word = "foster";
$game = new HangmanGame($word);
$game->guess("s");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("", "", "s", "", "", ""));
$pass[] = assert($game->misses === array());
$pass[] = assert(count($game->misses) === 0);
$game = new HangmanGame($word);
$game->guess("foster");
$pass[] = assert($game->state === HangmanGame::WIN);
$pass[] = assert($game->correct_positions === array("f", "o", "s", "t", "e", "r"));
$pass[] = assert($game->misses === array());
$pass[] = assert(count($game->misses) === 0);

// Game three
$word = "willbanks";
$game = new HangmanGame($word);
$game->guess("l");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("", "", "l", "l", "", "", "", "", ""));
$pass[] = assert($game->misses === array());
$pass[] = assert(count($game->misses) === 0);
$game->guess("i");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("", "i", "l", "l", "", "", "", "", ""));
$pass[] = assert($game->misses === array());
$pass[] = assert(count($game->misses) === 0);
$game->guess("a");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("", "i", "l", "l", "", "a", "", "", ""));
$pass[] = assert($game->misses === array());
$pass[] = assert(count($game->misses) === 0);
$game->guess("o");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("", "i", "l", "l", "", "a", "", "", ""));
$pass[] = assert($game->misses === array("o"));
$pass[] = assert(count($game->misses) === 1);
$game->guess("w");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("w", "i", "l", "l", "", "a", "", "", ""));
$pass[] = assert($game->misses === array("o"));
$pass[] = assert(count($game->misses) === 1);
$game->guess("b");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("w", "i", "l", "l", "b", "a", "", "", ""));
$pass[] = assert($game->misses === array("o"));
$pass[] = assert(count($game->misses) === 1);
$game->guess("n");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("w", "i", "l", "l", "b", "a", "n", "", ""));
$pass[] = assert($game->misses === array("o"));
$pass[] = assert(count($game->misses) === 1);
$game->guess("k");
$pass[] = assert($game->state === HangmanGame::PLAY);
$pass[] = assert($game->correct_positions === array("w", "i", "l", "l", "b", "a", "n", "k", ""));
$pass[] = assert($game->misses === array("o"));
$pass[] = assert(count($game->misses) === 1);
$game->guess("s");
$pass[] = assert($game->state === HangmanGame::WIN);
$pass[] = assert($game->correct_positions === array("w", "i", "l", "l", "b", "a", "n", "k", "s"));
$pass[] = assert($game->misses === array("o"));
$pass[] = assert(count($game->misses) === 1);


if (!in_array(NULL, $pass))
  echo "Success!!!\nAll assertions have passed\n";
