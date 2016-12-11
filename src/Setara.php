<?php
declare(strict_types=1);

namespace Novia713\Setara;

/**
 * Class Setara
 * Setara is a php class for hiding texts from simple view
 * WARNING: this is NOT strong encryption
 *
 * @package Novia713\Setara
 */
class Setara
{
    private $n;
    private $emojis;
    private $type;

    /**
     * Setara constructor.
     * @param $seed - STRING - name of a 1st generation pokemon
     */
    public function __construct($seed = null, $type = null)
    {
        require __DIR__ . "/../inc/kanto.php";
        $this->type = $type;

        if ($n = (int) array_search($seed, $kanto)) {
            $this->emojis = array_values(
              get_object_vars(
                json_decode(
                  file_get_contents(__DIR__ . "/../inc/emojis.json")
                )
              )
            );
            $this->n = $n;
        } else {
            die("Please, provide a 1st Pokemon name as seed");
        }
    }

    /**
     * Maker unreadable at simple view a text
     * @param $text
     * @return string
     */
    public function enc($text)
    {
        $i = 0;
        $tmp = [];
        foreach ($arr = str_split($text) as $letter) {
          if ($this->type == "emojis") {
            $tmp[] = trim(get_object_vars($this->emojis[ord($letter) + $this->n])['char']);
          }else{
            if ($i == count($arr) -1) {
                $tmp[]= ord($letter) + $this->n;
            } else {
                $tmp[]= ord($letter) + $this->n . ".";
            }
          }
            $i++;
        }

        return implode($tmp);
    }

    /**
     * Makes readable a text
     * @param $text
     * @return string
     */
    public function dec($text)
    {
        $tmp = [];
        if ($this->type == "emojis") {
          foreach ($arr = $this->mbstring_to_array($text) as $letter) {
            if ($n = (int) array_search($letter, array_column($this->get_ar_emojis(), 'char'))) {
              $tmp[] = chr($n - $this->n);
            }
          }
        }else{
          foreach (explode(".", $text) as $letter) {
              $tmp[] = chr($letter - $this->n);
          }
        }

        return implode($tmp);
    }

    private function get_ar_emojis() {
      $_ = [];
      foreach ($this->emojis as $emoji) {
        $_[] = get_object_vars($emoji);
      }
      return $_;
    }

    function mbstring_to_array ($string) {
      $strlen = mb_strlen($string);
      while ($strlen) {
          $array[] = mb_substr($string, 0, 1, "UTF-8");
          $string  = mb_substr($string, 1, $strlen, "UTF-8");
          $strlen  = mb_strlen($string);
      }
      return $array;
  }
}
