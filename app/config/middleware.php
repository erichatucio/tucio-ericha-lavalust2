<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$config['middlewares'] = [
    'auth' => new class {
        public function handle($next)
        {
            $session = load_class('session', 'libraries');
            $response = load_class('response', 'kernel');

            if (!$session->has_userdata('is_logged_in') || !$session->userdata('is_logged_in')) {
                $response->redirect('/login');
            }

            return $next();
        }
    }
];
