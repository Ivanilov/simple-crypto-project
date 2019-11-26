<?php

namespace App\Models\Auth\Traits\Attribute;

/**
 * Trait UserAttribute.
 */
trait UserAttribute
{
    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<span class='badge badge-success'>".__('labels.general.active').'</span>';
        }

        return "<span class='badge badge-danger'>".__('labels.general.inactive').'</span>';
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute()
    {
        if ($this->isConfirmed()) {
            if ($this->id != 1 && $this->id != auth()->id()) {
                return '<a href="'.route('admin.auth.user.unconfirm',
                        $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.unconfirm').'" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">'.__('labels.general.yes').'</span></a>';
            } else {
                return '<span class="badge badge-success">'.__('labels.general.yes').'</span>';
            }
        }

        return '<a href="'.route('admin.auth.user.confirm', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.confirm').'" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span></a>';
    }

    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        $roles = $this->getRoleNames()->toArray();

        if (count($roles)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item);
            }, $roles));
        }

        return 'N/A';
    }

    /**
     * @return string
     */
    public function getPermissionsLabelAttribute()
    {
        $permissions = $this->getDirectPermissions()->toArray();

        if (count($permissions)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item['name']);
            }, $permissions));
        }

        return 'N/A';
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->last_name
            ? $this->first_name.' '.$this->last_name
            : $this->first_name;
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->full_name;
    }

    /**
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        return $this->getAvatar();
    }

    /**
     * @param bool $size
     *
     * @return mixed
     */
    public function getAvatar($size = false)
    {
        // If user uploaded his own avatar^ show his avatar. Else request avatar from gravatar service
        if($this->hasAvatar())
        {
            return $this->getFirstMediaUrl('avatar', 'thumbnail');
        } else {
            return $this->getGravatar($size);
        }
    }

    public function hasAvatar()
    {
        return $this->getFirstMediaUrl('avatar');
    }

    public function getGravatar($size)
    {
        if (! $size) {
            $size = config('gravatar.default.size');
        }

        return gravatar()->get($this->email, ['size' => $size]);
    }

    /**
     * @return string
     */
    public function getSocialButtonsAttribute()
    {
        $accounts = [];

        foreach ($this->providers as $social) {
            $accounts[] = '<a href="'.route('admin.auth.user.social.unlink',
                    [$this, $social]).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.unlink').'" data-method="delete"><i class="fa fa-'.$social->provider.'"></i></a>';
        }

        return count($accounts) ? implode(' ', $accounts) : 'None';
    }

    /**
     * @return string
     */
    public function getLoginAsButtonAttribute()
    {
        /*
         * If the admin is currently NOT spoofing a user
         */
        if (! session()->has('admin_user_id') || ! session()->has('temp_user_id')) {
            //Won't break, but don't let them "Login As" themselves
            if ($this->id != auth()->id()) {
                return '<a href="'.route('admin.auth.user.login-as',
                        $this).'" class="dropdown-item"><i class="icon-cabinet"></i>'.__('buttons.backend.access.users.login_as', ['user' => $this->full_name]).'</a> ';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getClearSessionButtonAttribute()
    {
        if ($this->id != auth()->id() && config('session.driver') == 'database') {
            return '<a href="'.route('admin.auth.user.clear-session', $this).'"
			 	 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.continue').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                 class="dropdown-item" name="confirm_item"><i class="icon-eraser2"></i>'.__('buttons.backend.access.users.clear_session').'</a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.auth.user.show', $this).'" class="dropdown-item"><i class="fa fa-search"></i>'.__('buttons.general.crud.view').'</a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.auth.user.edit', $this).'" class="dropdown-item"><i class="fa fa-pencil"></i>'.__('buttons.general.crud.edit').'</a>';
    }
    /**
     *
     * @return string
     */
    public function getShowButtonMenuAttribute()
    {
        return '<a href="'.route('admin.auth.user.show', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonMenuAttribute()
    {
        return '<a href="'.route('admin.auth.user.edit', $this).'" class="btn btn-xs bg-indigo"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getChangePasswordButtonAttribute()
    {
        return '<a href="'.route('admin.auth.user.change-password', $this).'" class="dropdown-item"><i class="icon-key"></i>' .__('buttons.backend.access.users.change_password').'</a> ';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        if ($this->id != auth()->id()) {
            switch ($this->active) {
                case 0:
                    return '<a href="'.route('admin.auth.user.mark', [
                            $this,
                            1,
                        ]).'" class="dropdown-item"><i class="icon-user-check"></i>'.__('buttons.backend.access.users.activate').'</a> ';
                // No break

                case 1:
                    return '<a href="'.route('admin.auth.user.mark', [
                            $this,
                            0,
                        ]).'" class="dropdown-item"><i class="icon-user-block"></i>'.__('buttons.backend.access.users.deactivate').'</a> ';
                // No break

                default:
                    return '';
                // No break
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getConfirmedButtonAttribute()
    {
        if (! $this->isConfirmed() && ! config('access.users.requires_approval')) {
            return '<a href="'.route('admin.auth.user.account.confirm.resend', $this).'" class="dropdown-item"><i class="icon-mail-read"></i>'.__('buttons.backend.access.users.resend_email').'</a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id != auth()->id() && $this->id != 1) {
            return '<a href="'.route('admin.auth.user.destroy', $this).'"
                 data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                 class="dropdown-item"><i class="icon-user-cancel"></i>'.__('buttons.general.crud.delete').'</a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.auth.user.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.auth.user.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.restore_user').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
				<div class="btn-group btn-group-xs" role="group" aria-label="User Actions">
				  '.$this->restore_button.'
				  '.$this->delete_permanently_button.'
				</div>';
        }

        return '
    	<div class="btn-group btn-group-xs" role="group" aria-label="User Actions">
		  '.$this->show_button_menu.'
		  '.$this->edit_button_menu.'
		
		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-xs btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <i class="icon-gear"></i>
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">
			  <li>'.$this->clear_session_button.'</li>
			  <li>'.$this->login_as_button.'</li>
			  <li>'.$this->change_password_button.'</li>
			  <li>'.$this->status_button.'</li>
			  <li>'.$this->confirmed_button.'</li>
			  <li>'.$this->delete_button.'</li>
			</div>
		  </div>
		</div>';
    }
}
