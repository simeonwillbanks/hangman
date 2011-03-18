<?php
/**
 * Hangman Game
 * 
 * @author simeon f. willbanks <sfw@simeonfosterwillbanks.com>
 * @version 0.2
 * @package hangman
 */
class HangmanGame {
  
  /**
   * Game is over an player lost :(
   */
  const LOSS = 0;
  
  /**
   * Game is over an player won!
   */
  const WIN = 1;
  
  /**
   * Player can continue playing
   */
  const PLAY = 2;

  /**
   * String which fills empty members of correct positions array
   */
  const POSTION_FILL = "";
  
  /**
   * Ceiling tally mark
   */
  const TALLY_MARK_CEIL = 6;

  /**
   * State of the current game.
   * Will be either HangmanGame::LOSS, HangmanGame::WIN or HangmanGame::PLAY
   * @var integer
   */
  public $state;
 
  /**
   * Guesses which don't match the word
   * @var array
   */
  public $misses = array();
  
  /**
   * Correct guesses and any possible empties
   * @var array
   */
  public $correct_positions = array();
  
  /**
   * The word!
   * @var string
   */
  private $_word;

  public function __construct($word)
  {
    $this->_word = $word;
    // Fill correct positions with default string to the length of the passed word
    $this->correct_positions = array_fill(0, strlen($word), self::POSTION_FILL);
  }

  /**
   * Public API for guessing the word or a character in the word
   * 
   * @param string users guess
   * @return void
   */
  public function guess($guess)
  {
    if (strlen($guess) > 1) {
      $this->_guess_is_word($guess);
    } else {
      $this->_guess_in_word($guess);
    }
    $this->_set_state();
  } 

  /**
   * Set game state based on HangmanGame::$correct_positions and HangmanGame::$misses
   *
   * @return void
   */
  private function _set_state()
  {
    if (!in_array(self::POSTION_FILL, $this->correct_positions)) {
      $this->state = self::WIN;
    } elseif (in_array(self::POSTION_FILL, $this->correct_positions) && count($this->misses) < self::TALLY_MARK_CEIL) {
      $this->state = self::PLAY;
    } else {
      $this->state = self::LOSS;
    }
  }
  
  /**
   * Determine whether the guess matches the word
   *
   * @param string users guess
   * @return void
   */
  private function _guess_is_word($guess)
  {
    if ($guess === $this->_word) {
      $this->correct_positions = str_split($guess);
    } else {
      $this->misses[] = $guess;
    }
  }

  /**
   * Determine whether the guess is in the word
   *
   * @param string users guess
   * @return void
   */
  private function _guess_in_word($guess)
  {
    $miss = TRUE;
    $count = strlen($this->_word);
    for ($i = 0; $i < $count; ++$i) {
      if ($this->_word[$i] === $guess) {
        $this->correct_positions[$i] = $guess;
        $miss = FALSE;
      }
    }
    if ($miss) {
      $this->misses[] = $guess;
    }
  }

}