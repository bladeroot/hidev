<?php
/**
 * Automation tool mixed with code generator for easier continuous development
 *
 * @link      https://github.com/hiqdev/hidev
 * @package   hidev
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\handlers;

use Yii;

/**
 * Handler for copying.
 */
class CopyHandler extends BaseHandler
{
    /**
     * {@inheritdoc}
     */
    public function renderPath($path, $data)
    {
        copy($data->getCopy(), $path);
        Yii::warning('Copied file: ' . $path);
    }

    /**
     * {@inheritdoc}
     */
    public function parsePath($path, $minimal = null)
    {
        return;
    }
}
