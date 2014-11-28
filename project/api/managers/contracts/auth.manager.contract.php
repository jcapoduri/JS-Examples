<?php

interface IauthManager {
    public function isValidSession();

    public function getCurrentUser();
}

?>