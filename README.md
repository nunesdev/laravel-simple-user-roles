# Laravel Simple User Roles Without Database

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
