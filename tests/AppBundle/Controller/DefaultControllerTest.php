<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 *
 * @package Tests\AppBundle\Controller
 */
class DefaultControllerTest extends WebTestCase
{

    /**
     *  test l'affichage page accueil
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Talisman', $crawler->filter('#container h1')->text());
    }

    /**
     *  test le formulaire de connexion avec champs vide
     */
    public function testLoginFormEmpty()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $username = "";
        $password = "";

        $form = $crawler->filter('form[name="login_base"]')->form();
        $form->setValues(array('_username' => $username));
        $form->setValues(array('_password' => $password));
        $client->submit($form);

        $crawler = $client->followRedirect();
        $responseHeaders = $crawler->getUri();

        $this->assertEquals($responseHeaders, "http://localhost/");

    }

    /**
     *  test le formulaire de connexion avec champs valide
     */
    public function testLoginFormSuccess()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $username = "blacksoulx5@gmail.com";
        $password = "123abc123";

        $form = $crawler->filter('form[name="login_base"]')->form();
        $form->setValues(array('_username' => $username));
        $form->setValues(array('_password' => $password));
        $client->submit($form);

        $crawler = $client->followRedirect();
        $responseHeaders = $crawler->getUri();

        $this->assertEquals($responseHeaders, "http://localhost/mainpage");

    }

    /**
     *  test le formulaire de connexion avec champs non valide
     */
    public function testLoginFormError()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $username = "blacksoulx5@gmail.com";
        $password = "123abc1";

        $form = $crawler->filter('form[name="login_base"]')->form();
        $form->setValues(array('_username' => $username));
        $form->setValues(array('_password' => $password));
        $client->submit($form);

        $crawler = $client->followRedirect();
        $responseHeaders = $crawler->getUri();

        $this->assertEquals($responseHeaders, "http://localhost/");

    }

    /**
     *  test affichage de la main page ( post connexion )
     */
    public function testMainpage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Talisman', $crawler->filter('#container h1')->text());
    }


}
