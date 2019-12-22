<?php

/**
 * Polyfill for PHPUnit 4.8
 */
namespace PHPUnit\Framework
{
    if (false === class_exists('PHPUnit\\Framework\\TestCase')) {
        abstract class TestCase extends PHPUnit_Framework_TestCase
        {
        }
    }
}
