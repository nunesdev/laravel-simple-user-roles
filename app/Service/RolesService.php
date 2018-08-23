<?php

namespace App\Service;

class RolesService {
  private $levelsAndName, $roles, $rolesGroup;

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
      if(isset($role['group'])) {
        foreach($role['roles'] as $roleName) {
          $this->rolesGroup[$role['group']][$level] = $role['name'];
        }
      }
      if(isset($role['roles'])) {
        foreach($role['roles'] as $roleName) {
          $this->roles[$level][] = $roleName;
        }
      }
      if(isset($role['inheritance'])) {
        if(is_array($role['inheritance'])) {
          foreach($role['inheritance'] as $inherit) {
            foreach($this->roles[$inherit] as $roleInheritance) {
              $this->roles[$level][] = $roleInheritance;
            }
          }
        } else {
          foreach($this->roles[$role['inheritance']] as $roleInheritance) {
            $this->roles[$level][] = $roleInheritance;
          }
        }
      }
    }
  }

  public function getNames() {
    return $this->levelsAndName;
  }

  public function getNamesByGroup() {
    return $this->rolesGroup;
  }

  public function can($level, $role) {
    return in_array($role, $this->roles[$level]);
  }
}
