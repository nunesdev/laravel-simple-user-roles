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
      'name' => 'Default',
      'roles'=> ['post.view'],
    ],
    'editor' => [
      'name' => 'Editor',
      'roles' => ['post.create','post.delete'],
      'inheritance' => 'default'
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
