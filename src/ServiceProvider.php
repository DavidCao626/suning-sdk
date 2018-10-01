<?php
/**
 * User:  DavidCao626
 * Email: DavidCao626@gmail.com
 * Date: 2018/10/1
 * Time: 18:35
 */

namespace DavidCao626\SuningSdk;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    protected $defer = true;

    public function register()
    {
        $this->app->singleton(DefaultSuningClient::class, function () {
            return new DefaultSuningClient(
                config('services.suningSdk.serverUrl'),
                config('services.suningSdk.appKey'),
                config('services.suningSdk.appSecret'),
                config('services.suningSdk.format')
            );
        });

        $this->app->alias(DefaultSuningClient::class, 'suningSdk');
    }

    public function provides()
    {
        return [DefaultSuningClient::class, 'suningSdk'];
    }
}