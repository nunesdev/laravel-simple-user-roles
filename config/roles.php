<?php

return [

  'roles' => [

    // GROUP 1
    'default' => [
      'group' => 'group_1',
      'name' => 'Default',
      'roles'=> ['post.view'],
    ],
    'editor' => [
      'group' => 'group_1',
      'name' => 'Editor',
      'roles' => ['post.create','post.delete'],
      'inheritance' => 'default'
    ],
    'revisor' => [
      'group' => 'group_1',
      'name' => 'Revisor',
      'roles' => ['post.revision','post.publish'],
      'inheritance' => 'editor'
    ],
    'admin' => [
      'group' => 'group_1',
      'name' => 'Administrador',
      'roles' => ['settings','template.create','template.importer','pages.published'],
      'inheritance' => 'revisor'
    ],

    // GROUP 2
    'editor_page' => [
      'group' => 'group_2',
      'name' => 'Editor',
      'roles' => ['page.create','page.delete'],
    ],
    'revisor_page' => [
      'group' => 'group_2',
      'name' => 'Revisor',
      'roles' => ['page.revision','page.publish'],
      'inheritance' => 'editor_page'
    ],
    'admin_page' => [
      'group' => 'group_2',
      'name' => 'Administrador',
      'roles' => ['settings','template.create','template.importer','pages.published'],
      'inheritance' => 'revisor_page'
    ],


    'superadmin' => [
      'name' => 'Super Administrador',
      'roles' => ['user.create','user.edit','user.list','super.vision'],
      'inheritance' => ['admin','admin_page']
    ],
  ],
];
