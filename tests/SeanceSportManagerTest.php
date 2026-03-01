<?php
namespace App\Tests\Service;

use App\Entity\SeanceSport;
use App\Service\SeanceSportManager;
use PHPUnit\Framework\TestCase;

class SeanceSportManagerTest extends TestCase
{
    private SeanceSportManager $manager;

    protected function setUp(): void
    {
        $this->manager = new SeanceSportManager();
    }

    // ✅ TEST 1 : Séance valide
    public function testSeanceValide(): void
    {
        $seance = new SeanceSport();
        $seance->setNomSeance('Cardio Matin');
        $seance->setDureeMinutes(30);

        $this->assertTrue($this->manager->validate($seance));
    }

    // ❌ TEST 2 : Nom trop court
    public function testNomTropCourt(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le nom doit avoir au moins 2 caractères');

        $seance = new SeanceSport();
        $seance->setNomSeance('A');
        $seance->setDureeMinutes(30);

        $this->manager->validate($seance);
    }

    // ❌ TEST 3 : Nom vide
    public function testNomVide(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $seance = new SeanceSport();
        $seance->setNomSeance('');

        $this->manager->validate($seance);
    }

    // ❌ TEST 4 : Durée pas multiple de 5
    public function testDureeNonMultipleDe5(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('La durée doit être un multiple de 5');

        $seance = new SeanceSport();
        $seance->setNomSeance('Yoga');
        $seance->setDureeMinutes(33);

        $this->manager->validate($seance);
    }

    // ❌ TEST 5 : Durée négative
    public function testDureeNegative(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('La durée doit être supérieure à 0');

        $seance = new SeanceSport();
        $seance->setNomSeance('Musculation');
        $seance->setDureeMinutes(-10);

        $this->manager->validate($seance);
    }

    // ✅ TEST 6 : Médaille Or
    public function testMedailleOr(): void
    {
        $this->assertEquals('Or', $this->manager->calculerNiveauMedaille(120));
    }

    // ✅ TEST 7 : Médaille Bronze
    public function testMedailleBronze(): void
    {
        $this->assertEquals('Bronze', $this->manager->calculerNiveauMedaille(30));
    }

    // ✅ TEST 8 : Séance longue
    public function testSeanceLongue(): void
    {
        $this->assertTrue($this->manager->estSeanceLongue(60));
        $this->assertFalse($this->manager->estSeanceLongue(45));
    }
}