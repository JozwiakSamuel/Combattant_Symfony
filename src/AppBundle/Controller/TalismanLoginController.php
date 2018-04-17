<?php
/**
 * combattant
 *
 * @category    Pictime
 * @package     Pictime_
 * @copyright   Pictime 2018
 */

// src/Acme/UserBundle/AcmeUserBundle.php

namespace AppBundle\Controller;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class TalismanLoginController
 * override du FOSUserBundleController
 * @package AppBundle\Controller
 */
class TalismanLoginController extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
