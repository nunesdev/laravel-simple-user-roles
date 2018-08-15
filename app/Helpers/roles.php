<?php

function can($level, $role) {
	$roles = App::make('App\Service\RolesService');
	return $roles->can($level, $role);
}
