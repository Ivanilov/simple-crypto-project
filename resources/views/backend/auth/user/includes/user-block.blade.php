<div class="thumbnail user-block" style="box-shadow: none;">
    <div class="thumb thumb-rounded thumb-slide">
        <img src="{{ $user->avatar }}" alt="">
        <div class="caption">
                                <span>
                                    <a href="#" class="btn bg-success-400 btn-icon btn-xs" id="avatar-change"><i class="icon-upload"></i></a>
                                    @if($logged_in_user->hasAvatar())
                                        <a href="#" class="btn bg-success-400 btn-icon btn-xs" id="avatar-remove"><i class="icon-bin"></i></a>
                                    @endif
                                </span>
            <form id="avatar-form" method="post" enctype="multipart/form-data" action="/">
                <input type="file" id="avatar-upload" accept="image/*" name="file" style="width: 0px; opacity:0.0; filter:alpha(opacity=0);"/>
            </form>
        </div>
    </div>

    <div class="caption text-center">
        <h6 class="text-semibold no-margin">{{ $user->name }} <small class="display-block">{{ $user->email }}</small></h6>
    </div>
</div>