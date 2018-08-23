# Laravel Simple User Roles Without Database

## Add Helper
```dart
"autoload": {
    "classmap": [
        ...
    ],
    "psr-4": {
        "App\\": "app/"
    },
    "files": [
        "config/roles.php" // <---- ADD THIS
    ]
},
```

## Configuration Roles
Add roles in config/roles.php

```dart
return [

  'roles' => [
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
    
    'default_page' => [
      'group' => 'group_2',
      'name' => 'Default',
      'roles'=> ['post.view'],
    ],
    'editor_page' => [
      'group' => 'group_2',
      'name' => 'Editor',
      'roles' => ['page.create','page.delete'],
      'inheritance' => 'default_page'
    ],
    
    'admin' => [
      'name' => 'Administrator',
      'roles' => ['user.create','user.delete'],
      'inheritance' => ['editor_page','editor']
    ],
    
    ...
```

## How use in blade template

```dart
@if(can(session('user.level'),'post.delete'))
  // your code
@endif
```

## How use in function class

```dart
<?php
...
class PostController extends BaseController {

  public function delete(Request $request) {
    if(!can(session('user.level'),'post.delete')) 
      throw new Exception('You not have permission', 1);
  }
}
```
