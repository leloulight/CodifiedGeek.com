<?php
/* (c) Anton Medvedev <anton@elfet.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . '/common.php';

// Laravel shared dirs
set('shared_dirs', ['storage','storage/app']
    /*'storage/framework/cache',
   // 'storage/framework/sessions',
    //'storage/framework/views',
    'storage/logs']*/);

// Laravel 5 shared file
set('shared_files', ['.env', '.htaccess']);

// Laravel writable dirs
set('writable_dirs', ['storage', 'vendor']);

//migrate the database
task('deploy:run_migrations', function(){
    run('php {{release_path}}/artisan migrate');
})->desc('Run migrations');

/**
 * Main task
 */
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:shared',
    'deploy:run_migrations',
    'deploy:symlink',
    'cleanup',
])->desc('Deploy your project');
after('deploy', 'success');
