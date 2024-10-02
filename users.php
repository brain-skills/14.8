<?php
    function getUsersList() {
        return [
            'user1' => password_hash('password1', PASSWORD_DEFAULT),
            'user2' => password_hash('password2', PASSWORD_DEFAULT)
        ];
    }