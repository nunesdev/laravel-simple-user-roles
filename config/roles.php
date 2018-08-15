<?php

return [

  'roles' => [
    'default' => [
      'name' => 'Default',
      'roles'=> ['post.view'],
    ],
    'editor' => [
      'name' => 'Editor',
      'roles' => ['post.create','post.delete'],
      'inheritance' => 'default'
    ],
    'revisor' => [
      'name' => 'Revisor',
      'roles' => ['post.revision','post.publish'],
      'inheritance' => 'editor'
    ],
    'admin' => [
      'name' => 'Administrador',
      'roles' => ['settings','template.create','template.importer','pages.published'],
      'inheritance' => 'revisor'
    ],
    'superadmin' => [
      'name' => 'Super Administrador',
      'roles' => ['user.create','user.edit','user.list','super.vision'],
      'inheritance' => 'admin'
    ],
  ],
];
