<?php
namespace App\Tests;

use App\Entity\Exercice;
use App\Service\ExerciceManager;
use PHPUnit\Framework\TestCase;

class ExerciceManagerTest extends TestCase
{
    private ExerciceManager $manager;

    protected function setUp(): void
    {
        $this->manager = new ExerciceManager();
    }

    // ✅ TEST 1 : Exercice valide
    public function testExerciceValide(): void
    {
        $exercice = new Exercice();
        $exercice->setNomExercice('Pompes');
        $exercice->setCaloriesParMinute(8.5);

        $this->assertTrue($this->manager->validate($exercice));
    }

    // ❌ TEST 2 : Nom vide
    public function testExerciceSansNom(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le nom est obligatoire');

        $exercice = new Exercice();
        $exercice->setNomExercice('');

        $this->manager->validate($exercice);
    }

    // ❌ TEST 3 : Calories négatives
    public function testCaloriesNegatives(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Les calories doivent être supérieures à 0');

        $exercice = new Exercice();
        $exercice->setNomExercice('Squat');
        $exercice->setCaloriesParMinute(-5.0);

        $this->manager->validate($exercice);
    }

    // ✅ TEST 4 : Calcul calories totales correct
    public function testCalculCaloriesTotales(): void
    {
        $result = $this->manager->calculerCaloriesTotales(8.0, 30);
        $this->assertEquals(240.0, $result);
    }

    // ❌ TEST 5 : Durée négative dans calcul
    public function testDureeInvalide(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('La durée doit être positive');

        $this->manager->calculerCaloriesTotales(8.0, -5);
    }

    // ✅ TEST 6 : Calories zéro → exception
    public function testCaloriesZero(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $exercice = new Exercice();
        $exercice->setNomExercice('Yoga');
        $exercice->setCaloriesParMinute(0.0);

        $this->manager->validate($exercice);
    }
}