<?php

namespace App\Tests;

use App\Entity\Visite;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Description of VisiteTest
 *
 * @author manon
 */
class VisiteTest extends TestCase
{
    public function testGetDateCreationString()
    {
        $visite = new Visite();
        $visite->setDatecreation(new DateTime("2021-06-26"));
        $this->assertEquals("26/06/2021", $visite->getDatecreationString());
    }
}
