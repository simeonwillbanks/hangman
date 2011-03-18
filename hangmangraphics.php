<?php
/**
 * Graphics for Hangman Game
 * 
 * @author simeon f. willbanks <sfw@simeonfosterwillbanks.com>
 * @version 0.1
 * @package hangman
 */
class HangmanGraphics {
  
  /**
   * 
   * Hangman game miss graphics from Wikipedia
   * 
   * @var array
   * @access private
   * @license These files are licensed under the Creative Commons 
   *          Attribution-Share Alike 3.0 Unported license.
   * @see http://en.wikipedia.org/wiki/Hangman_(game)
   */
  private $_diagram = array(
    "http://upload.wikimedia.org/wikipedia/commons/8/8b/Hangman-0.png",
    "http://upload.wikimedia.org/wikipedia/commons/8/8b/Hangman-1.png",
    "http://upload.wikimedia.org/wikipedia/commons/8/8b/Hangman-2.png",
    "http://upload.wikimedia.org/wikipedia/commons/8/8b/Hangman-3.png",
    "http://upload.wikimedia.org/wikipedia/commons/8/8b/Hangman-4.png",
    "http://upload.wikimedia.org/wikipedia/commons/8/8b/Hangman-5.png",
    "http://upload.wikimedia.org/wikipedia/commons/8/8b/Hangman-6.png",
  );
  
  /**
   * Based on a miss, show the state of the Hangman game
   *
   * @param integer $miss current miss
   * @return string
   */
  public function diagram($miss=0)
  {
    return (isset($this->_diagram[$miss])) ? $this->_diagram[$miss] : "";
  }

}