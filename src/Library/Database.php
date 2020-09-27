<?php
/*
 *  +----------------------------------------------------------------------
 *  | Created by  hahadu (a low phper and coolephp)
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2020. [hahadu] All rights reserved.
 *  +----------------------------------------------------------------------
 *  | SiteUrl: https://github.com/hahadu
 *  +----------------------------------------------------------------------
 *  | Author: hahadu <582167246@qq.com>
 *  +----------------------------------------------------------------------
 *  | Date: 2020/9/26 下午12:37
 *  +----------------------------------------------------------------------
 *  | Description:   cooleAdmin
 *  +----------------------------------------------------------------------
 */

namespace Coole\CoolePHP;


class Database implements \mysql_xdevapi\DatabaseObject
{

    /**
     * @inheritDoc
     */
    public function existsInDatabase(): bool
    {
        // TODO: Implement existsInDatabase() method.
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    /**
     * @inheritDoc
     */
    public function getSession(): \mysql_xdevapi\Session
    {
        // TODO: Implement getSession() method.
    }
}