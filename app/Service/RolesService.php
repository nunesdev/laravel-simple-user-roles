<?php

namespace App\Service;

class RolesService {
  private $levelsAndName, $roles;

  public function __construct() {
    $roles = config('roles.roles');
    if(sizeof($roles) > 0)
      $this->addRoles($roles);
  }

  public function addRoles($roles) {
    foreach($roles as $level=>$role) {
      if(isset($role['name'])) {
        $this->levelsAndName[$level] = $role['name'];
      }
      if(isset($role['roles'])) {
        foreach($role['roles'] as $roleName) {
          $this->roles[$level][] = $roleName;
        }
      }
      if(isset($role['inheritance'])) {
        foreach($this->roles[$role['inheritance']] as $roleInheritance) {
          $this->roles[$level][] = $roleInheritance;
        }
      }
    }
  }

  public function getNames() {
    return $this->levelsAndName;
  }

  public function can($level, $role) {
    return in_array($role, $this->roles[$level]);
  }
}
