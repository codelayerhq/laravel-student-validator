<?php

namespace Codelayer\StudentValidator\Tests;

use Codelayer\StudentValidator\EduDomain;
use PHPUnit\Framework\TestCase;

class StudentFormatTest extends TestCase
{
    /**
     * @var \Codelayer\StudentValidator\EduDomain
     */
    private $eduDomain;

    public function setUp(): void
    {
        $this->eduDomain = new EduDomain();
    }

    public function testItAcceptsAValidEduDomains()
    {
        $this->assertTrue($this->eduDomain->isValidTld('kit.edu'));
        $this->assertTrue($this->eduDomain->isValidTld('uni-paderborn.de'));
    }

    public function testItRejectsInvalidEduDomains()
    {
        $this->assertFalse($this->eduDomain->isValidTld('codelayer.de'));
        $this->assertFalse($this->eduDomain->isValidTld('kit.de'));
    }

    public function testItAcceptsValidSubDomains()
    {
        $this->assertTrue($this->eduDomain->isValid('student.kit.edu'));
        $this->assertTrue($this->eduDomain->isValid('cs.uni-paderborn.de'));
    }

    public function testItRejectsInvalidSubDomains()
    {
        $this->assertFalse($this->eduDomain->isValid('www.google.de'));
        $this->assertFalse($this->eduDomain->isValid('cs.example.com'));
    }

    public function testItAcceptsValidEmails()
    {
        $this->assertTrue($this->eduDomain->isValidEmail('foo@kit.edu'));
        $this->assertTrue($this->eduDomain->isValidEmail('foo@student.kit.edu'));
        $this->assertTrue($this->eduDomain->isValidEmail('john.doe@mail.cs.uni-paderborn.de'));
    }

    public function testItRejectsInvalidEmails()
    {
        $this->assertFalse($this->eduDomain->isValidEmail('foo@kit.de'));
        $this->assertFalse($this->eduDomain->isValidEmail('foo@student.codelayer.de'));
    }
}
