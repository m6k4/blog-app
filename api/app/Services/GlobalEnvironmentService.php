<?php

namespace App\Services;

class GlobalEnvironmentService
{
    static protected $globalConfiguration = [];
    static protected $enivormentName = null;

    /**
    * Get configuration by current environment.
    * @param String $enivorment
    * @return \stdClass
    */
    static public function getConfigurationByCurrentEnvironment(String $enivorment = null): \stdClass
    {
        if(self::isGlobalConfigurationRowEmpty())
            return self::$globalConfiguration; 
            
        self::$globalConfiguration = \App\Models\GlobalEnvironment::GetGlobalConfigurationFromDB($enivorment ?? self::$enivormentName);
        self::$enivormentName = $enivorment;
        return self::$globalConfiguration;
    }

    /**
    * Check is global configuration row empty.
    * @return Bool
    */
    static private function isGlobalConfigurationRowEmpty(): Bool
    {
        return collect(self::$globalConfiguration)->count() != 0;
    }
}