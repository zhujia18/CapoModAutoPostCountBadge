<?php

/*
 * This file is part of justoverclock/auto-post-count-badge.
 *
 * Copyright (c) 2021 Marco Colia.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace CapoMod\AutoPostCountBadge;

use Flarum\Extend;
use Flarum\Api\Serializer\UserSerializer;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\ApiSerializer(UserSerializer::class))
        ->attributes(AddUserAttributes::class)
];
