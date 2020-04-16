<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Admin;

use App\Controller\AppController;

class FundingCyclesController extends AppController
{

    public function index()
    {
        return null;
    }

    public function add()
    {
        return null;
    }

    public function edit()
    {
        if ($this->request->is('post')) {
            if($this->FundingCycle->save($this->request->getData())){
                debug("test");
            }
        }
        return null;
    }
}
