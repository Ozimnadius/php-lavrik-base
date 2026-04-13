<?php

return (function () {
  $intGT0 = '[1-9]+\d*';

  return [
    [
      'test' => '/^$/',
      'controller' => 'category/all'
    ],
    [
      'test' => "/^article\/($intGT0)\/?$/",
      'controller' => 'article/one',
      'params' => ['id' => 1]
    ],
    [
      'test' => '/^article\/add\/?$/',
      'controller' => 'article/add',
      'auth' => true
    ],
    [
      'test' => "/^article\/edit\/($intGT0)\/?$/",
      'controller' => 'article/edit',
      'params' => ['id' => 1],
      'auth' => true
    ],
    [
      'test' => "/^article\/delete\/($intGT0)\/?$/",
      'controller' => 'article/delete',
      'params' => ['id' => 1],
      'auth' => true
    ],
    [
      'test' => "/^category\/($intGT0)\/?$/",
      'controller' => 'category/one',
      'params' => ['id' => 1]
    ],
    [
      'test' => '/^category\/add\/?$/',
      'controller' => 'category/add',
      'auth' => true
    ],
    [
      'test' => "/^category\/edit\/($intGT0)\/?$/",
      'controller' => 'category/edit',
      'params' => ['id' => 1],
      'auth' => true
    ],
    [
      'test' => "/^category\/delete\/($intGT0)\/?$/",
      'controller' => 'category/delete',
      'params' => ['id' => 1],
      'auth' => true
    ],
    [
      'test' => '/^contacts\/?$/',
      'controller' => 'contacts'
    ],
    [
      'test' => "/^auth\/login\/?$/",
      'controller' => 'auth/login'
    ],
    [
      'test' => "/^auth\/logout\/?$/",
      'controller' => 'auth/logout'
    ]
  ];
})();