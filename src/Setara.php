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

    /**
     * Setara constructor.
     * @param $seed - STRING - name of a 1st generation pokemon
     *
     */
    public function __construct($seed = null)
    {
        require __DIR__ . "/../inc/kanto.php";

        if ($n = (int) array_search($seed, $kanto)) {
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

            if ($i == count($arr) -1) {
                $tmp[]= ord($letter) + $this->n;
            } else {
                $tmp[]= ord($letter) + $this->n . " ";
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
          foreach (explode(" ", $text) as $letter) {
              $tmp[] = chr($letter - $this->n);
          }
        return implode($tmp);
    }
}
