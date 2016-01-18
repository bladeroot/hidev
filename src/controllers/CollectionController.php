<?php

/*
 * Task runner, code generator and build tool for easier continuos integration
 *
 * @link      https://github.com/hiqdev/hidev
 * @package   hidev
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2014-2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\controllers;

/**
 * Abstract controller with collection inside.
 */
abstract class CollectionController extends AbstractController implements \yii\base\Arrayable, \ArrayAccess, \IteratorAggregate
{
    use \hiqdev\yii2\collection\ObjectTrait;
}