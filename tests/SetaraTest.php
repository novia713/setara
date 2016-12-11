<?php declare(strict_types=1);


namespace Novia713\Setara;

class SetaraTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->setara = new Setara("Ekans", "emojis");
    }

    public function testEnc()
    {
        $this->assertEquals(
          $this->setara->enc("La guitarra fue tocada por gitanos, que luego regresaro al campo"),
          "🙏👶😧👴💃👲🚶👶👰👰👶😧👱💃👩😧🚶🎅👧👶👨👶😧👼🎅👰😧👴👲🚶👶🕵🎅🏃😴😧👸💃👩😧👷💃👩👴🎅😧👰👩👴👰👩🏃👶👰🎅😧👶👷😧👧👶💂👼🎅"
        );
    }


    public function testDec()
    {
        $this->assertEquals(
          $this->setara->dec(
            "🙏👶😧👴💃👲🚶👶👰👰👶😧👱💃👩😧🚶🎅👧👶👨👶😧👼🎅👰😧👴👲🚶👶🕵🎅🏃😴😧👸💃👩😧👷💃👩👴🎅😧👰👩👴👰👩🏃👶👰🎅😧👶👷😧👧👶💂👼🎅"
          ),
          "La guitarra fue tocada por gitanos, que luego regresaro al campo"
        );
    }

    public function testVocals()
    {
        $this->assertNotEquals(
          $this->setara->enc("ÁÉÍÓÚáéíóúÄäà"),
          $this->setara->enc($this->setara->dec($this->setara->enc("ÁÉÍÓÚáéíóúÄäà")))
        );
    }
}
