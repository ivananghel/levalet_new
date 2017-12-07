<?php


return [
	'profileEdit' =>[
		'admin' =>[
			'first_name'                => 'required|max:255',
			'last_name'                 => 'required|max:255',
			'phone'                     => 'numeric',
			'email'                     => 'required|email|unique:users,email',
			'password'                  => 'min:4|max:255|confirmed',
			'password_confirmation'     => 'min:4|max:255'
		]
	],
	'user' => [
		'create' => [
			'first_name'                => 'required|max:255',
			'last_name'                 => 'required|max:255',
			'email'                     => 'required|email|unique:users,email',
			'password'                  => 'required|min:4|max:255|confirmed',
			'password_confirmation'     => 'min:4|max:255'
		],
		'update' => [
			'first_name'                => 'required|max:255',
            'last_name'                 => 'required|max:255',
            'email'                     => 'required|email|unique:users,email',
            'password'                  => 'nullable|min:4|max:255|confirmed',
            'password_confirmation'     => 'nullable|min:4|max:255'
		]
	],
		'colorgroup' => [
			'create' => [
				'title'                	=> 'required',
				'group.*.name'			=> 'required',
				'group.*.color'			=> 'required',
			],
			'update' => [
				'first_name'                => 'required|max:255',
				'last_name'                 => 'required|max:255',
				'email'                     => 'required|email|unique:users,email',
				'password'                  => 'nullable|min:4|max:255|confirmed',
				'password_confirmation'     => 'nullable|min:4|max:255'
			]
		]
];