<?php

return [
    'book/([0-9]+)' => 'book/view/$1',
    'book/create' => 'book/create',
    'book/update/([0-9]+)' => 'book/update/$1',
    'book/delete/([0-9]+)' => 'book/delete/$1',
    '' => 'site/index'
];