<?php
    namespace App\Providers;

    use Illuminate\Support\ServiceProvider;
    use App\Libraries\CustomHasher;
    
    class CustomHasherServiceProvider extends ServiceProvider {
        /**
         * Register the service provider.
         *
         * @return void
         */
        public function register() {
            $this->app->singleton('hash', function () {
                return new CustomHasher();
            });
        }
        /**
         * Get the services provided by the provider.
         *
         * @return array
         */
        public function provides() {
            return array('hash');
        }
    }