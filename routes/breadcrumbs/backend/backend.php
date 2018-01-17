<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::register('admin.menu', function ($breadcrumbs) {
    $breadcrumbs->push(__('strings.backend.menu.title'), route('admin.menu', ['parent_id' => '0']));
});

Breadcrumbs::register('admin.menu.show', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.menu');
    $breadcrumbs->push(__('strings.backend.menu.edit'), route('admin.menu.show', ['parent_id' => '0']));
});

Breadcrumbs::register('admin.menu.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.menu');
    $breadcrumbs->push(__('strings.backend.menu.create'), route('admin.menu.create', ['parent_id' => '0']));
});

Breadcrumbs::register('admin.pages.index', function ($breadcrumbs) {
    $breadcrumbs->push(__('strings.backend.pages.title'), route('admin.pages.index'));
});

Breadcrumbs::register('admin.pages.show', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.pages.index');
    $breadcrumbs->push(__('strings.backend.pages.edit'), route('admin.pages.show'));
});

Breadcrumbs::register('admin.pages.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.pages.index');
    $breadcrumbs->push(__('strings.backend.pages.create'), route('admin.pages.create'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
