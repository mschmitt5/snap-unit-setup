<?php
/**
 * Created by PhpStorm.
 * User: schmi
 * Date: 2/1/2018
 * Time: 8:28 AM
 **/

public final function getSetUpOperation() {
    return new Composite([
        Factory::DELETE_ALL(),
        Factory::INSERT()
    ]);
}

	public final function setUp()  : void {
    // run the default setUp() method first
    parent::setUp();
    $password = "abc123";
    $this->VALID_PROFILE_SALT = bin2hex(random_bytes(32));
    $this->VALID_PROFILE_HASH = hash_pbkdf2("sha512", $password, $this->VALID_PROFILE_SALT, 262144);


    // create and insert a Profile to own the test Tweet
    $this->profile = new Profile (generateUuidV4(), null,"name", "test@phpunit.de",$this->VALID_PROFILE_HASH, "+12125551212", $this->VALID_PROFILE_SALT);
    $this->profile->insert($this->getPDO());

    // calculate the date (just use the time the unit test was setup...)
    $this->VALID_ARTICLEDATE = new \DateTime();

    //format the sunrise date to use for testing
    $this->VALID_SUNRISEDATE = new \DateTime();
    $this->VALID_SUNRISEDATE->sub(new \DateInterval("P10D"));

    //format the sunset date to use for testing
    $this->VALID_SUNSETDATE = new\DateTime();
    $this->VALID_SUNSETDATE->add(new \DateInterval("P10D"));



}