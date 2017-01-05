<?php

namespace KraftHaus\BauhausUser;

/**
 * This file is part of the KraftHaus BauhausUser package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Support\Facades\Hash;
use KraftHaus\Bauhaus\Admin;

/**
 * Class UserAdmin
 * @package KraftHaus\BauhausUser
 */
class UserAdmin extends Admin
{

	/**
	 * Public constructor override to set translatable names (singular, plural).
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->setSingularName(trans('bauhaususer::admin.users.title.singular'));
		$this->setPluralName(trans('bauhaususer::admin.users.title.plural'));
	}

	/**
	 * Configure the UserAdmin list.
	 *
	 * @param \KraftHaus\Bauhaus\Mapper\ListMapper $mapper
	 *
	 * @access public
	 * @return void
	 */
	public function configureList($mapper)
	{
		$mapper->identifier('full_name')
			->label(trans('bauhaususer::admin.users.list.name'));

		$mapper->string('email')
			->label(trans('bauhaususer::admin.users.list.email'));

		$mapper->belongsToMany('groups')
			->display('name')
			->label(trans('bauhaususer::admin.users.list.groups'));
	}

	/**
	 * Configure the UserAdmin form.
	 *
	 * @param  \KraftHaus\Bauhaus\Mapper\FormMapper $mapper
	 *
	 * @access public
	 * @return void
	 */
	public function configureForm($mapper)
	{
		$mapper->tab(trans('bauhaususer::admin.users.form.tabs.general'), function ($mapper) {
			$mapper->text('email')
				->label(trans('bauhaususer::admin.users.form.email.label'))
				->placeholder(trans('bauhaususer::admin.users.form.email.placeholder'));

			$mapper->password('password')
				->label(trans('bauhaususer::admin.users.form.password.label'))
				->placeholder(trans('bauhaususer::admin.users.form.password.placeholder'));

			$mapper->password('password_confirmation')
				->label(trans('bauhaususer::admin.users.form.password-confirm.label'))
				->placeholder(trans('bauhaususer::admin.users.form.password-confirm.placeholder'));

			$mapper->select('is_active')
				->label(trans('bauhaususer::admin.users.form.status.label'))
				->options( [
					0 => "Inactive",
					1 => "Active"
				] );
		});

		$mapper->tab(trans('bauhaususer::admin.users.form.tabs.info'), function ($mapper) {
			$mapper->text('first_name')
				->label(trans('bauhaususer::admin.users.form.first-name.label'))
				->placeholder(trans('bauhaususer::admin.users.form.first-name.placeholder'));

			$mapper->text('last_name')
				->label(trans('bauhaususer::admin.users.form.last-name.label'))
				->placeholder(trans('bauhaususer::admin.users.form.last-name.placeholder'));

			$mapper->belongsToMany('groups')
				->display('name')
				->placeholder(trans('bauhaususer::admin.users.form.groups.label'));
		});
	}

	/**
	 * Configure the UserAdmin filters.
	 * @param  \KraftHaus\Bauhaus\Mapper\FilterMapper $mapper
	 *
	 * @access public
	 * @return void
	 */
	public function configureFilters($mapper)
	{
		$mapper->text('email')
			->label(trans('bauhaususer::admin.users.filter.email'));
	}

	/**
	 * Scoping on active state.
	 *
	 * @param  \KraftHaus\Bauhaus\Mapper\ScopeMapper $mapper
	 *
	 * @access public
	 * @return void
	 */
	public function configureScopes($mapper)
	{
		$mapper->scope('active')
			->label(trans('bauhaususer::admin.users.scope.active-users'));
	}

	/**
	 * Create hook.
	 *
	 * @param  array $input
	 *
	 * @access public
	 * @return void
	 */
	public function create($input)
	{
		if ($input['password'] == '') {
			unset($input['password']);
		} else {
			$input['password'] = Hash::make($input['password']);
		}

		return User::create($input);
	}

	/**
	 * Update hook.
	 *
	 * @param  array $input
	 *
	 * @access public
	 * @return void
	 */
	public function update($input)
	{
		$user = User::find($input['user_id']);

		if ($input['password'] == '') {
			unset($input['password']);
		} else {
			$input['password'] = Hash::make($input['password']);
		}

		$user->update($input);
	}

}