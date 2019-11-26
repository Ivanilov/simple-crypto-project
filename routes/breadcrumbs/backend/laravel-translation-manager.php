<?php

Breadcrumbs::register('admin.translations', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.log-viewer.main'), url('admin/translations'));
});
