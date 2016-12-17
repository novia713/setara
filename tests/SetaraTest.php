<?php declare(strict_types=1);


namespace Novia713\Setara;

class SetaraTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->setara = new Setara("Mew");
    }


    public function testVocals()
    {
        $text = "ÁÉÍÓÚáéíóúÄäàØæñçàèìòù";
        $this->assertEquals(
          $this->setara->enc($text),
          $this->setara->enc(
            $this->setara->dec(
              $this->setara->enc($text)
            )
          )
        );
    }

    public function testAPhrase()
    {
        $text = "'Matrimoniadas' fué una serie muy divertida, como 'Escenas de matrimoñio'";
        $this->assertEquals(
          $this->setara->enc($text),
          $this->setara->enc(
            $this->setara->dec(
              $this->setara->enc($text)
            )
          )
        );

    }


    public function testAPhrase2()
    {
        $text = "Hallo";
        $this->assertEquals(
          $this->setara->enc($text),
          $this->setara->enc(
            $this->setara->dec(
              $this->setara->enc($text)
            )
          )
        );

        echo $this->setara->enc($text);
    }
}
