<?php

return [
    'book/([0-9]+)' => 'book/view/$1',
    'book/create' => 'book/create',
    'book/comment/([0-9]+)' => 'book/comment/$1',
    '' => 'site/index'
];