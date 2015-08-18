<?php

/**
 * This file is part of the KraftHaus BauhausUser package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

	'menu' => 'Users',
	'signed-in-as' => 'Signed in as :name',

	'users' => [
		'menu'  => 'Overview',
		'title' => [
			'singular' => 'User',
			'plural'   => 'Users'
		],
		'list' => [
			'name'   => 'Name',
			'email'  => 'Email address',
			'groups' => 'Groups'
		],
		'form' => [
			'tabs' => [
				'general' => 'General',
				'info'    => 'Info'
			],
			'email' => [
				'label'       => 'Email address',
				'placeholder' => 'The users email address'
			],
			'password' => [
				'label'       => 'Password',
				'placeholder' => 'The users password'
			],
			'password-confirm' => [
				'label'       => 'Confirm Password',
				'placeholder' => 'Repeat the users password'
			],
			'first-name' => [
				'label'       => 'First name',
				'placeholder' => 'The users first name'
			],
			'last-name' => [
				'label'       => 'Last name',
				'placeholder' => 'The users last name'
			],
			'groups' => [
				'label' => 'Groups'
			],
			'status' => [
				'label' => 'Status'
			]
		],
		'filter' => [
			'email' => 'Email'
		],
		'scope' => [
			'active-users' => 'Active users'
		]
	],

	'groups' => [
		'menu'  => 'Groups',
		'title' => [
			'singular' => 'Group',
			'plural'   => 'Groups'
		],
		'list' => [
			'name'        => 'Name',
			'permissions' => 'Permissions'
		],
		'form' => [
			'name' => [
				'label'       => 'Name',
				'placeholder' => 'The groups name'
			],
			'permissions' => [
				'label' => 'Permissions'
			]
		]
	],

	'permissions' => [
		'menu'  => 'Permissions',
		'title' => [
			'singular' => 'Permission',
			'plural'   => 'Permissions'
		],
		'list' => [
			'name'        => 'Name',
			'value'       => 'Value',
			'description' => 'Description'
		],
		'form' => [
			'name' => [
				'label'       => 'Name',
				'placeholder' => 'The permission name'
			],
			'value' => [
				'label'       => 'Value',
				'placeholder' => 'The permission value'
			],
			'description' => [
				'label'       => 'Description',
				'placeholder' => 'The permission description'
			]
		],
		'filter' => [
			'name'        => 'Name',
			'value'       => 'Value',
			'description' => 'Description'
		]
	]

];