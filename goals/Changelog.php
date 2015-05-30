<?php

/*
 * Highy Integrated Development.
 *
 * @link      https://hidev.me/
 * @package   hidev
 * @license   BSD 3-clause
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hidev\goals;

use Yii;

/**
 * Goal for README
 */
class Changelog extends Template
{
    public function getTemplate()
    {
        return 'CHANGELOG';
    }
}