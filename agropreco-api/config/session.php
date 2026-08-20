<?php
return ['driver' => env('SESSION_DRIVER', 'file'), 'lifetime' => 120, 'expire_on_close' => false, 'encrypt' => false, 'files' => storage_path('framework/sessions'), 'cookie' => env('SESSION_COOKIE', 'agropreco_session')];
