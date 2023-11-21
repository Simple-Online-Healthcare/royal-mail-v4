<?php

declare(strict_types=1);

namespace SimpleOnlineHealthcare\RoyalMail;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Illuminate\Support\ServiceProvider;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use SimpleOnlineHealthcare\RoyalMail\Clients\RoyalMailShippingApiClient;
use SimpleOnlineHealthcare\RoyalMail\Clients\RoyalMailShippingAuthClient;
use SimpleOnlineHealthcare\RoyalMail\Serialization\StudlyPropertyNamingStrategy;

class RoyalMailServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/royalmail.php' => config_path('royalmail.php'),
        ], 'config');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/royalmail.php', 'royalmail');

        $this->initializeSerializerAutoloader();

        $this->registerShippingAuthClient();
        $this->registerShippingApiClient();
        $this->registerShippingSerializer();
    }

    /**
     * @return void
     */
    protected function initializeSerializerAutoloader(): void
    {
        /** @noinspection PhpDeprecationInspection */
        AnnotationRegistry::registerLoader([require base_path('vendor/autoload.php'), 'loadClass']);
    }

    /**
     * @return void
     */
    protected function registerShippingAuthClient(): void
    {
        $this->app->singleton(RoyalMailShippingAuthClient::class, function () {
            return new RoyalMailShippingAuthClient(
                config('royalmail.shipping.auth.clientId'),
                config('royalmail.shipping.auth.clientSecret'),
            );
        });
    }

    /**
     * @return void
     */
    protected function registerShippingApiClient(): void
    {
        $this->app->singleton(RoyalMailShippingApiClient::class, function () {
            return new RoyalMailShippingApiClient(
                $this->app->make('serializer.shipping'),
                $this->app->make(RoyalMailShippingAuthClient::class),
            );
        });
    }

    /**
     * @return void
     */
    protected function registerShippingSerializer(): void
    {
        $this->app->bind('serializer.shipping', function () {
            return SerializerBuilder::create()
                ->setCacheDir(config('royalmail.shipping.serializer.cachePath'))
                ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new StudlyPropertyNamingStrategy()))
                ->setDebug(config('royalmail.shipping.serializer.debug'))
                ->build();
        });
    }
}
