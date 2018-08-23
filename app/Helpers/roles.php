<?php

function levels() {
	$roles = App::make('App\Service\RolesService');
	return $roles->getNames();
}

function levels_group() {
	$roles = App::make('App\Service\RolesService');
	return $roles->getNamesByGroup();
}

function level_name($level) {
	return levels()[$level];
}

function can($level, $role) {
	$roles = App::make('App\Service\RolesService');
	return $roles->can($level, $role);
}
