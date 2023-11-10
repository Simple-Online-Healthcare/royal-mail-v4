<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Illuminate\Support\ServiceProvider;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use SimpleOnlineHealthcare\RoyalMail\Clients\RoyalMailShippingApiClient;
use SimpleOnlineHealthcare\RoyalMail\Clients\RoyalMailShippingAuthClient;
use SimpleOnlineHealthcare\RoyalMail\Clients\RoyalMailTrackingApiClient;
use SimpleOnlineHealthcare\RoyalMail\Clients\RoyalMailTrackingAuthClient;
use SimpleOnlineHealthcare\RoyalMail\Serialization\StudlyPropertyNamingStrategy;

class RoyalMailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/royalmail.php' => config_path('royalmail.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/royalmail.php', 'royalmail');

        $this->initializeSerializerAutoloader();

        $this->registerShippingAuthClient();
        $this->registerShippingApiClient();
        $this->registerShippingSerializer();

        $this->registerTrackingAuthClient();
        $this->registerTrackingApiClient();
        $this->registerTrackingSerializer();
    }

    protected function initializeSerializerAutoloader()
    {
        /** @noinspection PhpDeprecationInspection */
        AnnotationRegistry::registerLoader([require base_path('vendor/autoload.php'), 'loadClass']);
    }

    protected function registerShippingAuthClient()
    {
        $this->app->singleton(RoyalMailShippingAuthClient::class, function () {
            return new RoyalMailShippingAuthClient(
                config('royalmail.shipping.auth.clientId'),
                config('royalmail.shipping.auth.clientSecret'),
            );
        });
    }

    protected function registerShippingApiClient()
    {
        $this->app->singleton(RoyalMailShippingApiClient::class, function () {
            return new RoyalMailShippingApiClient(
                $this->app->make('serializer.shipping'),
                $this->app->make(RoyalMailShippingAuthClient::class),
            );
        });
    }

    protected function registerShippingSerializer()
    {
        $this->app->bind('serializer.shipping', function () {
            return SerializerBuilder::create()
                ->setCacheDir(config('royalmail.shipping.serializer.cachePath'))
                ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new StudlyPropertyNamingStrategy()))
                ->setDebug(config('royalmail.shipping.serializer.debug'))
                ->build()
            ;
        });
    }

    protected function registerTrackingAuthClient()
    {
        $this->app->singleton(RoyalMailTrackingAuthClient::class, function () {
            return new RoyalMailTrackingAuthClient(
                config('royalmail.tracking.auth.clientId'),
                config('royalmail.tracking.auth.clientSecret'),
            );
        });
    }

    protected function registerTrackingApiClient()
    {
        $this->app->singleton(RoyalMailTrackingApiClient::class, function () {
            return new RoyalMailTrackingApiClient(
                $this->app->make('serializer.tracking'),
                $this->app->make(RoyalMailShippingAuthClient::class),
            );
        });
    }

    protected function registerTrackingSerializer()
    {
        $this->app->singleton('serializer.tracking', function () {
            return SerializerBuilder::create()
                ->setCacheDir(config('royalmail.tracking.serializer.cachePath'))
                ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
                ->setDebug(config('royalmail.tracking.serializer.debug'))
                ->build()
            ;
        });
    }
}
