<?php

use PHPUnit\Framework\TestCase;
use WLRegistryAPI\WLRegistry;


final class WlRegistryTest extends TestCase
{
    public function testRegonForSingleSubjectByNip(): void
    {
        $wl = new WLRegistry();

        $wl->setDate("2021-01-01");
        $subject = $wl->searchSingleSubjectByNip("5252344078");
        $this->assertEquals(
            '140182840',
            $subject->getSubject()->getRegon()
        );
    }

    public function testRegonForSingleSubjectByNipError(): void
    {
        $wl = new WLRegistry();

        $wl->setDate("2021-01-01");
        $subject = $wl->searchSingleSubjectByNip("52523440718");
        $this->assertEquals(
            $subject->getMessage(),
            "Pole 'NIP' ma nieprawidłową długość. Wymagane 10 znaków."
        );
        $this->assertEquals(
            "WL-113",
            $subject->getCode()
        );
    }

    public function testRegonForSubjectsByBankAccount(): void
    {
        $wl = new WLRegistry();

        $wl->setDate("2021-01-01");
        $subject = $wl->searchSubjectsByBankAccount("34103015080000000504162001");
        foreach ($subject->getSubjects() as $subject) {
            $this->assertEquals(
                '140182840',
                $subject->getRegon()
            );
        }
    }

    public function testSearchSubjectsByNips(): void
    {
        $wl = new WLRegistry();

        $wl->setDate("2021-01-01");
        $subject = $wl->searchSubjectsByNips("5252344078");
        foreach ($subject->getEntries() as $entry) {
            foreach ($entry->getSubjects() as $subject1) {
                $this->assertEquals(
                    '140182840',
                    $subject1->getRegon()
                );
            }
        }
    }

    public function searchSubjectsByBankAccounts(): void
    {
        $wl = new WLRegistry();

        $wl->setDate("2021-01-01");
        $subject = $wl->searchSubjectsByBankAccounts("12114010100000361155001002,34103015080000000504162001");
        foreach ($subject->getEntries() as $entry) {
            foreach ($entry->getSubjects() as $subject1) {
                $this->assertContains(
                    $subject1->getRegon(),
                    ['930171612', '140182840']

                );
            }
        }
    }


    public function testRegonForSingleSubjectByRegon(): void
    {
        $wl = new WLRegistry();

        $wl->setDate("2021-01-01");
        $subject = $wl->searchSingleSubjectByRegon("930171612");
        $this->assertEquals(
            '930171612',
            $subject->getSubject()->getRegon()
        );
    }

    public function testRegonForSubjectsByRegons(): void
    {
        $wl = new WLRegistry();

        $wl->setDate("2021-01-01");
        $subject = $wl->searchSubjectsByRegons("930171612,140182840");
        foreach ($subject->getEntries() as $entry) {
            foreach ($entry->getSubjects() as $subject1) {
                $this->assertContains(
                    $subject1->getRegon(),
                    ['930171612', '140182840']

                );
            }
        }
    }
}