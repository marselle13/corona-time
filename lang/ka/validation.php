<?php

return [
	'required' => 'სავალდებულოა',
	'unique'   => ':attribute უკვე არსებობს',
	'min'      => [
		'string' => ':attribute უნდა იყოს მინიმუმ :min სიმბოლო.',
	],
	'confirmed'       => ':attribute არ ემთხვევა',
	'no_email'        => '',

	'custom' => [
		'email' => [
			'exists' => 'ასეთი ელ-ფოსტა არ არსებობს',
		],
	],
];
