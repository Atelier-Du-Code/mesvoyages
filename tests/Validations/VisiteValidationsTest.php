<?php

namespace App\Tests\Validations;

use App\Entity\Visite;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Description of VisiteValidationsTest
 *
 * @author manon
 */
class VisiteValidationsTest extends KernelTestCase
{
    public function getVisite():Visite
    {
        return (new Visite())
            ->setVille("New York")
            ->setPays("USA");
    }
    
    public function testValidNoteVisite()
    {
        $visite = $this->getVisite()->setNote(10);        
        $this->assertErrors($visite, 0);
    }
    
    public function testNonValidNoteVisite()
    {
        $visite = $this->getVisite()->setNote(21);        
        $this->assertErrors($visite, 1);
    }
    
    
    public function assertErrors(Visite $visite, int $nbErreursAttendues, string $message="")
    {
        self::bootKernel();
        $error = self::$container->get('validator')->validate($visite);
        $this->assertCount($nbErreursAttendues, $error, $message);
    }
    
    public function testNonValidTempmaxVisite()
    {
        $visite = $this->getVisite()
                ->setTempmin(20)
                ->settempmax(18);
        $this->assertErrors($visite, 1, "min=20, max=18, le test devrait échouer");
    }
}
