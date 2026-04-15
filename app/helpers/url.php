<?php

function basePath(): string
{
    return '/EQF_ServiceHub/public';
}

function asset(string $path): string
{
    return basePath() . '/assets/' . ltrim($path, '/');
}

function route(string $path = ''): string
{
    return basePath() . '/' . ltrim($path, '/');
}