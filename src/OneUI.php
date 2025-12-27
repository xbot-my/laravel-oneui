<?php

declare( strict_types = 1 );

namespace XBot\OneUI;

use Exception;
use XBot\OneUI\Enums\Package;
use Illuminate\Foundation\Application;
use Illuminate\Container\Attributes\Singleton;

#[Singleton]
class OneUI
{
    /**
     * OneUI ASCII Base64 encoded banner.
     */
    private const string BANNER = <<<BASE64
IOKWiOKWiOKWiOKWiOKWiOKWiOKVlyDilojilojilojilZcgIC
DilojilojilZfilojilojilojilojilojilojilojilZcgICAg
4paI4paI4pWXICAg4paI4paI4pWX4paI4paI4pWXCuKWiOKWiO
KVlOKVkOKVkOKVkOKWiOKWiOKVl+KWiOKWiOKWiOKWiOKVlyAg
4paI4paI4pWR4paI4paI4pWU4pWQ4pWQ4pWQ4pWQ4pWdICAgIO
KWiOKWiOKVkSAgIOKWiOKWiOKVkeKWiOKWiOKVkQrilojiloji
lZEgICDilojilojilZHilojilojilZTilojilojilZcg4paI4p
aI4pWR4paI4paI4paI4paI4paI4pWXICAgICAg4paI4paI4pWR
ICAg4paI4paI4pWR4paI4paI4pWRCuKWiOKWiOKVkSAgIOKWiO
KWiOKVkeKWiOKWiOKVkeKVmuKWiOKWiOKVl+KWiOKWiOKVkeKW
iOKWiOKVlOKVkOKVkOKVnSAgICAgIOKWiOKWiOKVkSAgIOKWiO
KWiOKVkeKWiOKWiOKVkQrilZrilojilojilojilojilojiloji
lZTilZ3ilojilojilZEg4pWa4paI4paI4paI4paI4pWR4paI4p
aI4paI4paI4paI4paI4paI4pWXICAgIOKVmuKWiOKWiOKWiOKW
iOKWiOKWiOKVlOKVneKWiOKWiOKVkQog4pWa4pWQ4pWQ4pWQ4p
WQ4pWQ4pWdIOKVmuKVkOKVnSAg4pWa4pWQ4pWQ4pWQ4pWd4pWa
4pWQ4pWQ4pWQ4pWQ4pWQ4pWQ4pWdICAgICDilZrilZDilZDilZ
DilZDilZDilZ0g4pWa4pWQ4pWdIA==
BASE64;
    
    /**
     * Package version.
     */
    public const string VERSION = '1.0.0';
    
    public function __construct( protected Application $app )
    {
        //
    }
    
    /**
     * Get the package version.
     */
    public static function version(): string
    {
        return self::VERSION;
    }
    
    /**
     * Get the package banner.
     *
     * @return string
     */
    public static function banner(): string
    {
        return str(self::BANNER)->fromBase64()->toString();
    }
    
    /**
     * Get the package names.
     *
     * @return array
     */
    public static function packages( ?string $name = null ): array
    {
        if ($name) {
            return Package::get($name);
        }
        
        
        return Package::map(fn( Package $package ) => $package->packageName());
    }
}
