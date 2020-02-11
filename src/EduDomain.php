<?php

namespace Codelayer\StudentValidator;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\EmailParser;
use Pdp\Cache;
use Pdp\CurlHttpClient;
use Pdp\Manager;

class EduDomain
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private $domains;

    /**
     * VatFormat constructor.
     */
    public function __construct()
    {
        $this->domains = collect(json_decode(file_get_contents(__DIR__ . '/../resources/universities/domains.json')));
    }

    /**
     * @param string $domain
     *
     * @return bool
     */
    public function isValidTld($domain)
    {
        return $this->domains->contains($domain);
    }

    /**
     * @param string $domain
     *
     * @return bool
     */
    public function isValid($domain)
    {
        return $this->isValidTld($this->getRegistrableFromDomain($domain));
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public function isValidEmail($email)
    {
        $parser = new EmailParser(new EmailLexer());

        $domain = $parser->parse($email)['domain'];

        return $this->isValid($domain);
    }

    /**
     * @param string $domain
     *
     * @return string|null
     */
    private function getRegistrableFromDomain($domain)
    {
        $manager = new Manager(new Cache(), new CurlHttpClient());
        $rules = $manager->getRules();

        return $rules->resolve($domain)->getRegistrableDomain();
    }
}
