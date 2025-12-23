<?php
declare( strict_types = 1 );

if (! function_exists('oneui')) {
    function oneui( string $view, array $data = [] ): string
    {
        return view("oneui::{$view}", $data)->render();
    }
}
