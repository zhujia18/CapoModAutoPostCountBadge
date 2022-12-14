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

use Flarum\Api\Serializer\UserSerializer;
use Flarum\User\User;

class AddUserAttributes
{   
    public function __invoke(UserSerializer $serializer, User $user, array $attribtues): array
    {
        if (!$user->isGuest()) {
            $level = $this->getUserLevel($user);

            $attribtues['autoCountBadge'] = $this->getBadgeForLevel($level);
            $attribtues['autoCountBadgeLabel'] = $this->getBadgeLabelForLevel($level);
            $attribtues['autoCountBadgeStyle'] = $this->getBadgeStyleForLevel($level);
        }

        return $attribtues;
    }

    private function getUserLevel(User $user): int
    {
        $count = $user->comment_count;

        if (!$count) {
            return 0;
        }

        switch ($count) {
            case $count >= 0 && $count <= 9:
                return 1;
            case $count >= 10 && $count <= 49:
                return 2;
            case $count >= 50 && $count <= 99:
                return 3;
            case $count >= 100 && $count <= 299:
                return 4;
            case $count >= 300 && $count <= 599:
                return 5;
            case $count >= 600 && $count <= 999:
                return 6;
            case $count >= 1000 && $count <= 1999:
                return 7;
            case $count >= 2000 && $count <= 3999:
                return 8;
            case $count >= 4000:
                return 9;
        }
    }

    private function getBadgeForLevel(int $level): string
    {
        switch ($level) {
            case $level === 1:
                return 'fas fa-chess-pawn';
            case $level === 2:
                return 'fas fa-chess-pawn';
            case $level === 3:
                return 'fas fa-chess-pawn';
            case $level === 4:
                return 'fas fa-chess-pawn';
            case $level === 5:
                return 'fas fa-chess-knight';
            case $level === 6:
                return 'fas fa-chess-bishop';
            case $level === 7:
                return 'fas fa-chess-rook';
            case $level === 8:
                return 'fas fa-chess-king';
            case $level === 9:
                return 'fas fa-chess-king';
            default:
                return '';
        }
    }

    private function getBadgeLabelForLevel(int $level): string
    {
        switch ($level) {
            case $level === 1:
                return 'Lv1-????????????';
            case $level === 2:
                return 'Lv2-????????????';
            case $level === 3:
                return 'Lv3-????????????';
            case $level === 4:
                return 'Lv4-????????????';
            case $level === 5:
                return 'Lv5-????????????';
            case $level === 6:
                return 'Lv6-????????????';
            case $level === 7:
                return 'Lv7-????????????';
            case $level === 8:
                return 'Lv8-????????????';
            case $level === 9:
                return 'Lv9-Capo??????';
            default:
                return '';
        }
    }

    private function getBadgeStyleForLevel(int $level): string
    {
        switch ($level) {
            case $level === 1:
                return 'auto-badge-style1';
            case $level === 2:
                return 'auto-badge-style1';
            case $level === 3:
                return 'auto-badge-style1';
            case $level === 4:
                return 'auto-badge-style2';
            case $level === 5:
                return 'auto-badge-style2';
            case $level === 6:
                return 'auto-badge-style2';
            case $level === 7:
                return 'auto-badge-style3';
            case $level === 8:
                return 'auto-badge-style3';
            case $level === 9:
                return 'auto-badge-style3';
            default:
                return '';
        }
    }
}
